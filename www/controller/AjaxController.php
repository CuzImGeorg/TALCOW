<?php
require_once('AbstractBase.php');



class AjaxController extends AbstractBase {


    public function sysInfo() {
        if($this->hasPermission("showsysinfo") || $this->hasPermission("sudo")) {

            $date = date("d.m.Y", time());
            $time = date("H:i:s", time());
            $hn = gethostname();
            $up = $this->upTime();
            $this->addContext("date", $date);
            $this->addContext("time", $time);
            $this->addContext("hostname", $hn);
            $this->addContext("uptime", $up);
        }
    }



    public function mgruser() {
        if($this->hasPermission("showuser") || $this->hasPermission("sudo")) {
            if (isset($_POST["uid"])) {
                $user = array(Qser::finde((int)$_POST["uid"]));
            } else {
                $user = Qser::findeALL();
            }
            $this->addContext("user", $user);
        }
    }

    private function upTime() {
        $str   = @file_get_contents('/proc/uptime');
        $num   = (int) $str;
        $secs  = $num % 60;
        $num   = (int)($num / 60);
        $mins  = $num % 60;
        $num   = (int)($num / 60);
        $hours = $num % 24;
        $num   = (int)($num / 24);
        $days  = $num;

        return $days . ":" . $hours. ":". $mins;
    }

    public function loadPermissions() {
        if($this->hasPermission("viewpermission") || $this->hasPermission("sudo")) {

            if (isset($_GET["uid"])) {
                $permissions = Berechtigung::findBerechtigungByUserID($_GET["uid"]);
            } else {
                $permissions = Berechtigung::findeALL();
            }
            $this->addContext("perms", $permissions);
        }

    }
    public function loadUserPermissions() {
        if($this->hasPermission("viewuserpermissions") || $this->hasPermission("sudo")) {

            if (isset($_POST["uid"])) {
                $permissions = Qser_hat_berechtigung::findByUid($_POST["uid"]);
            } else if (isset($_POST["bname"])) {
                $permissions = Qser_hat_berechtigung::findeUserByBerechtigungName($_POST["bname"]);
            } else {
                $permissions = Qser_hat_berechtigung::findeALL();
            }
            $this->addContext("perms", $permissions);
        }
    }

    public function logLevel() {
        if($this->hasPermission("readlog") || $this->hasPermission("sudo")) {

            $logs = Log_level::findeALL();
            $this->addContext("logs", $logs);
        }
    }

    public function log() {
        if($this->hasPermission("readlog") || $this->hasPermission("sudo")) {
            if (isset($_POST['uid'])) {
                $logs = Log::findLogByUserID($_POST['uid']);
            } elseif (isset($_POST['lvl'])) {
                $bits = $_POST['lvl'];
                $subSql = "";
                $subSql .= $bits[0] == 1 ? "'debug' OR name LIKE " : "";
                $subSql .= $bits[1] == 1 ? "'warning' OR name LIKE " : "";
                $subSql .= $bits[2] == 1 ? "'error' OR name LIKE " : "";
                $subSql .= $bits[3] == 1 ? "'critical'" : "''";

                $logs = Log::fineLogsByLogAnyLevel($subSql);
            } else if (isset($_POST['name'])) {
                $logs = Log::findLogByLog_ActionName($_POST['name']);
            } else {
                $logs = Log::findeALL();
            }
            $this->addContext("logs", $logs);
        }

    }


    public function logAktions() {
        if($this->hasPermission("readlog") || $this->hasPermission("sudo")) {

            $akt = Log_action::findeALL();
            $this->addContext("akt", $akt);
        }
    }



    public function updateUsernameList() {
        $user = Qser::findeALL();
        $this->addContext("user", $user);

    }

    public function updatePermissionList() {
        $perm = Berechtigung::findeALL();
        $this->addContext("perm", $perm);

    }

    public function webTerminal () {

    }



    //I think this is needed IDK for what
    public function demonMonitor() {
        
    }

    public function loadServiceMonitor() {
        if($this->hasPermission("servicemonitor") || $this->hasPermission("sudo")) {

            $srvs = M_servicemonitor::findeALL();
            $monitor = array();
            foreach ($srvs as $srv) {
                $rs = "ihassphp";
                if ($srv->isServicetype()) {
                    $rs = shell_exec("systemctl status " . $srv->getServicename());
                    $active = "geathnetxD";
                    $color = "#fff";
                    $btn = "Error567";
                    if (str_contains($rs, "Active: active")) {
                        $active = "running";
                        $color = "#128a20";
                        $btn = "Stop";
                    } else if (str_contains($rs, "Active: inactive")) {
                        $active = "inactive";
                        $color = "#d97914";
                        $btn = "Start";
                    } else if (str_contains($rs, "Active: activating")) {
                        $active = "activating";
                        $color = "#71ad58";
                        $btn = "Stop";
                    } else if (str_contains($rs, "Active: deactivating")) {
                        $active = "deactivating";
                        $color = "#ba4141";
                        $btn = "Start";

                    } else if (str_contains($rs, "Active: failed")) {
                        $active = "failed";
                        $color = "#5e5757";
                        $btn = "Start";

                    } else if (str_contains($rs, "Active: not-found")) {
                        $active = "not-found";
                        $color = "#403a3a";
                        $btn = "N/A";
                    } else if (str_contains($rs, "Active: dead")) {
                        $active = "dead";
                        $color = "#5e5757";
                        $btn = "N/A";
                    }
                } else {
                    $rs = shell_exec("service status " . $srv->getServicename());
                }


                $monitor[] = array("service" => $srv, "active" => $active, "color" => $color, "btn" => $btn);

            }
            $this->addContext("monitors", $monitor);
        }

    }

    public function loadSystemUser() {
        if($this->hasPermission("showsysuser") || $this->hasPermission("sudo")) {
            $handle = fopen("/etc/passwd", "r");
            if ($handle) {
                while (($line = fgets($handle)) !== false) {
                    $un = explode(":", $line)[0];
                    if (file_exists("/home/" . $un)) { //str_contains($line, "/home/") && str_contains($line,"/bin/")
                        $users[] = $un;
                    }
                }
                fclose($handle);
            }
            $this->addContext("users", $users);
        }
    }

    public function loadDockerPsMinusA() {
        $handle = fopen("view/rsrc/tmp/dockertmp.txt", "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                $un = explode("  ", $line)[0];
                $users[] = $un;
            }

            fclose($handle);
        }
        $this->addContext("output", $users);

    }

    public function loadNameHitory() {
        if($this->hasPermission("shownamehistory") || $this->hasPermission("sudo")) {
            $unh = Unhistory::findeByUserid($_POST["uid"]);
            $user = Qser::finde($_POST["uid"]);
            $this->addContext("unh", $unh);
            $this->addContext("user", $user);
        }
    }

    public function loadModul(){
        if($this->hasPermission("managemodules") || $this->hasPermission("sudo")) {

            $m = Modul::findeALL();
            $this->addContext("moduls", $m);
        }
    }

    public function loadPostgreSQL() {
        if($this->hasPermission("showpgdatabases") || $this->hasPermission("sudo")) {

            $databases = M_postgresql::findeALL();
            foreach ($databases as $database) {
                if($database->getPgdatabase() !== "talcow") {
                    try {
                        $db = array("db" => $database, "tables" => $database->getDB()->query(" SELECT tablename FROM pg_catalog.pg_tables WHERE schemaname != 'pg_catalog' AND schemaname != 'information_schema'")->fetchALL());
                        $dbs[] = $db;

                    } catch (Exception $e) {
                        $db = array("db" => $database, "tables" => null);
                        $dbs[] = $db;

                    }
                }
            }
            $this->addContext("databases", $dbs);
        }
    }
    public function sqlquery() {
        if($this->hasPermission("execSQL") || $this->hasPermission("sudo")) {
            $db = M_postgresql::finde($_POST["did"]);
            $res = $db->getDB()->query($_POST["sql"])->fetchAll();
            $log = new Log();
            $log->setUid($_SESSION["userid"]);
            $log->setDescription("Query Executed" . $_POST["sql"]);
            $log->setAction(Log_action::findeByName("sql")->getId());
            $log->setLevel(Log_level::getByName("debug")->getId());
            $log->setTimestamp(date("Y-m-d H:i:s"));
            $log->speichere();
            $this->addContext("res", $res);
        }
    }
    public function getTables() {
        if($this->hasPermission("showdatabasetables") || $this->hasPermission("sudo")) {
            $sql = "SELECT table_name, column_name, data_type, character_maximum_length, column_default FROM information_schema.columns WHERE " . $_POST["name"] . " ORDER BY table_name";
            $result = M_postgresql::findeByName($_POST["db"])->getDB()->query($sql)->fetchAll();
            $this->addContext("result", $result);
        }

    }



}



?>