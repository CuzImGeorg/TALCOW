<?php
require_once('AbstractBase.php');



class AjaxController extends AbstractBase {


    public function sysInfo() {

        $date = date( "d.m.Y" ,time());
        $time = date( "H:i:s" ,time());
        $hn = gethostname();
        $up = $this->upTime();
        $this->addContext("date", $date);
        $this->addContext("time", $time);
        $this->addContext("hostname", $hn);
        $this->addContext("uptime", $up);


    }



    public function mgruser() {

            if(isset($_GET["uid"])) {
                $user = array(  Qser::finde((int) $_GET["uid"]));
                $this->addContext("user", $user);
            }
            else {
                $user = Qser::findeALL();
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

        if(isset($_GET["uid"])) {
            $permissions = Berechtigung::findBerechtigungByUserID($_GET["uid"]);
        } else {
            $permissions = Berechtigung::findeALL();
        }
        $this->addContext("perms", $permissions);


    }
    public function loadUserPermissions() {

        if(isset($_GET["uid"])) {
            $permissions = Qser_hat_berechtigung::findByUid($_GET["uid"]);
        } else if (isset($_GET["bname"])) {
            $permissions = Qser_hat_berechtigung::findeUserByBerechtigungName($_GET["bname"]);
        }
        else {
            $permissions = Qser_hat_berechtigung::findeALL();
        }
        $this->addContext("perms", $permissions);


    }

    public function logLevel() {
        $logs = Log_level::findeALL();
        $this->addContext("logs", $logs);
    }

    public function log() {
        if(isset($_GET['uid'])){
            $logs = Log::findLogByUserID($_GET['uid']);
        }elseif (isset($_GET['lvl'])){
            $bits = $_GET['lvl'];
            $subSql = "";
            $subSql .= $bits[0] == 1 ? "'debug' OR name LIKE " : "";
            $subSql .= $bits[1] == 1 ? "'warning' OR name LIKE " : "";
            $subSql .= $bits[2] == 1 ? "'error' OR name LIKE " : "";
            $subSql .= $bits[3] == 1 ? "'critical'" : "''";

            $logs = Log::fineLogsByLogAnyLevel($subSql);
        }else  if(isset($_GET['name'])){
            $logs = Log::findLogByLog_ActionName($_GET['name']);
        }
        else {
            $logs = Log::findeALL();
        }
        $this->addContext("logs", $logs);


    }


    public function logAktions() {
        $akt = Log_action::findeALL();
        $this->addContext("akt", $akt);

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



    public function demonMonitor() {

    }

    public function loadServiceMonitor() {
        $srvs = M_servicemonitor::findeALL();
        $monitor = array();
        foreach ($srvs as $srv) {
            $rs = "ihassphp";
            if($srv->isServicetype()) {
               $rs = shell_exec("systemctl status ". $srv->getServicename());

            }else {

            }
            $active = "geathnetxD";
            $color = "#fff";
            $btn = "Error567";
            if(str_contains($rs, "Active: active")) {
                $active = "running";
                $color = "#128a20";
                $btn = "Stop";
            }else if(str_contains($rs, "Active: inactive")){
                $active = "inactive";
                $color = "#d97914";
                $btn = "Start";
            } else if(str_contains($rs, "Active: activating")) {
                $active = "activating";
                $color = "#71ad58";
                $btn = "Stop";
            } else  if(str_contains($rs, "Active: deactivating")) {
                $active = "deactivating";
                $color = "#ba4141";
                $btn = "Start";

            } else  if(str_contains($rs, "Active: failed")) {
                $active = "failed";
                $color = "#5e5757";
                $btn = "Start";

            } else  if(str_contains($rs, "Active: not-found")) {
                $active = "not-found";
                $color = "#403a3a";
                $btn = "N/A";
            } else  if(str_contains($rs, "Active: dead")) {
                $active = "dead";
                $color = "#5e5757";
                $btn = "N/A";
            }

            $monitor[] = array("service" => $srv, "active" => $active, "color" => $color, "btn" => $btn );

        }
        $this->addContext("monitors", $monitor);


    }

    public function updateServiceList() {

    }


}



?>
