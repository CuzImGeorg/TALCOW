<?php
require_once ('AbstractBase.php');
class ExecuteController extends AbstractBase {

    public function reboot()  {
        if($this->hasPermission("rebootsystem")|| $this->hasPermission("sudo") ) {
            $info = "Try Performing Reboot";
            $log = new Log();
            $log->setUid($_SESSION["userid"]);
            $log->setLevel(Log_level::getByName("debug")->getId());
            $log->setAction(Log_action::findeByName("reboot")->getId());
            $log->setTimestamp(date("Y-m-d H:i:s"));
            $log->setDescription("The Server was succuessfully rebooted");
            $log->speichere();
            shell_exec("reboot");

        }else {
            $info = "No Permissions to Perform reboot";
        }
        $this->setTemplate("info");
        $this->addContext("info" , $info);

    }

    public function removeLog() {
        if($this->hasPermission("deletelog") || $this->hasPermission("sudo")){
            Log::finde($_POST["lid"])->loesche();
            var_dump($_POST["lid"]);
            exit();
        } else {
            $info = "No Permissions to Delete Logs";
        }
        $this->setTemplate("info");
        $this->addContext("info" , $info);

    }

    public function btnAddUserBerechtigung() {
        if($this->hasPermission("adduserpermission") || $this->hasPermission("sudo") ) {
           $q = new Qser_hat_berechtigung();
           $q->setUid(Qser::findeUserByName($_POST["name"])->getId());
           $q->setBid(Berechtigung::findeBerechtigungByNamed($_POST["perm"])->getId());
           $q->setUseredit($_SESSION["userid"]);
           $q->setCreatetime(date("Y-m-d H:i:s"));
           $q->speichere();

            $log = new Log();
            $log->setUid($_SESSION["userid"]);
            $log->setLevel(Log_level::getByName("debug")->getId());
            $log->setAction(Log_action::findeByName("permission change")->getId());
            $log->setTimestamp(date("Y-m-d H:i:s"));
            $log->setDescription("The User " . $_POST["name"] . " has get he permission " . $_POST["perm"]);
            $log->speichere();
        }else {
            $info = "No Permissions to add permission";
        }
        $this->setTemplate("info");
        $this->addContext("info" , $info);
    }

    public function newUser(){
        if($this->hasPermission("createUser") ||$this->hasPermission("sudo")) {
            $u = new Qser();
            if(strlen($_POST["name"]) > 32 ) {
                $u->setName(substr($_POST["name"], 0, 32));
            }else {
                $u->setName($_POST["name"]);
            }
            $u->setPassword($_POST["pw"]);
            $u->setActive(true);
            $u->setCreatedate(date("Y-m-d H:i:s"));
            $u->setDescription($_POST["desc"]);
            $u->speichere();
            $log = new Log();
            $log->setUid($_SESSION["userid"]);
            $log->setLevel(Log_level::getByName("debug")->getId());
            $log->setAction(Log_action::findeByName("user")->getId());
            $log->setTimestamp(date("Y-m-d H:i:s"));
            $log->setDescription("The User " . $_POST["name"] . " has been created ");
            $log->speichere();
        } else {
            $info = "No Permission";
        }
        $this->setTemplate("info");
        $this->addContext("info" , $info);

    }

    public function addServiceMontor()
    {
        if($this->hasPermission("addservicemonitor") || $this->hasPermission("sudo")) {

            $m = new M_servicemonitor();
            $m->setServicename($_POST["name"]);
            $m->setDescription($_POST["desc"]);
            $m->setUid($_SESSION["userid"]);
            $m->setServicetype($_POST["st"]);
            $m->speichere();

            $log = new Log();
            $log->setUid($_SESSION["userid"]);
            $log->setLevel(Log_level::getByName("debug")->getId());
            $log->setAction(Log_action::findeByName("srvmon")->getId());
            $log->setTimestamp(date("Y-m-d H:i:s"));
            $log->setDescription("The Service  " . $_POST["name"] . " has  been added to Monitor");
            $log->speichere();


            $this->setTemplate("info");
        }
    }



    public function dluser(){
        if($this->hasPermission("deleteuser") || $this->hasPermission("sudo")) {
            $o = shell_exec("deluser " . $_POST['name']);

            $log = new Log();
            $log->setUid($_SESSION["userid"]);
            $log->setLevel(Log_level::getByName("debug")->getId());
            $log->setAction(Log_action::findeByName("user")->getId());
            $log->setTimestamp(date("Y-m-d H:i:s"));
            $log->setDescription("The System User  " . $_POST["name"] . " has  been removed");
            $log->speichere();
            $this->addContext("info", $o);
            $this->setTemplate("info");
        }
    }

    public function changeUserName() {
        if($this->hasPermission("changeusername") || $this->hasPermission("sudo")) {
            $u = Qser::finde($_POST["uid"]);
            $oldname = $u->getName();
            $u->setName($_POST["name"]);
            $u->speichere();

            $log = new Log();
            $log->setUid($_SESSION["userid"]);
            $log->setLevel(Log_level::getByName("debug")->getId());
            $log->setAction(Log_action::findeByName("user")->getId());
            $log->setTimestamp(date("Y-m-d H:i:s"));
            $log->setDescription("The User  " . $oldname . "  name changes to " .  $_POST["name"]);
            $log->speichere();

            $this->setTemplate("info");
        }
    }
    public function changeUserpw() {
        $u = Qser::finde($_POST["uid"]);
        $u->setPassword($_POST["pw"]);
        $u->speichere();
        $log = new Log();
        $log->setUid($_SESSION["userid"]);
        $log->setLevel(Log_level::getByName("debug")->getId());
        $log->setAction(Log_action::findeByName("user")->getId());
        $log->setTimestamp(date("Y-m-d H:i:s"));
        $log->setDescription("The User  " .  $u->getName()  . " password changed" );
        $log->speichere();
        $this->setTemplate("info");
    }

    public function changeSystemUserName() {
        if($this->hasPermission("changesysusername") || $this->hasPermission("sudo")) {
            $log = new Log();
            $log->setUid($_SESSION["userid"]);
            $log->setLevel(Log_level::getByName("debug")->getId());
            $log->setAction(Log_action::findeByName("user")->getId());
            $log->setTimestamp(date("Y-m-d H:i:s"));
            $log->setDescription("The User  " . Qser::finde($_POST["uid"]->getName()) . "  name changes to " .  $_POST["name"]);
            $log->speichere();

            shell_exec("usermod -l " . $_POST["name"] . " " . Qser::finde($_POST["uid"]->getName()));
            $this->setTemplate("info");
        }
    }

    public function changesysuserpw() {
        if($this->hasPermission("changesysuserpw") || $this->hasPermission("sudo")) {

            $log = new Log();
            $log->setUid($_SESSION["userid"]);
            $log->setLevel(Log_level::getByName("debug")->getId());
            $log->setAction(Log_action::findeByName("user")->getId());
            $log->setTimestamp(date("Y-m-d H:i:s"));
            $log->setDescription("The User  " .  $_POST["un"] . " password changed" );
            $log->speichere();

            $cmd = sprintf("echo '%s:%s' | sudo chpasswd",
                escapeshellarg($_POST["un"]),
                escapeshellarg($_POST["pwd"]));
            shell_exec($cmd);
            $this->setTemplate("info");
        }
    }

    public function dropdb() {
        if($this->hasPermission("droppgdatabase") || $this->hasPermission("sudo")) {

            if ($_POST["name"] != "talcow") {
                $log = new Log();
                $log->setUid($_SESSION["userid"]);
                $log->setLevel(Log_level::getByName("debug")->getId());
                $log->setAction(Log_action::findeByName("db")->getId());
                $log->setTimestamp(date("Y-m-d H:i:s"));
                $log->setDescription("The Database " . $_POST["name"] . " has been droped "  );
                $log->speichere();
                M_postgresql::findeByName($_POST["name"])->loesche();
                DB::getDB()->exec("DROP DATABASE " . $_POST["name"]);
            }
            $this->setTemplate("info");
        }

    }

    public function dropTable(){
        $db = M_postgresql::findeByName($_POST["db"])->getDB();
        if($_POST["cas"]) {
            $db->exec("DROP TABLE " . $_POST["name"] . " CASCADE");
        }else {
            $db->exec("DROP TABLE " . $_POST["name"]);
        }
        $log = new Log();
        $log->setUid($_SESSION["userid"]);
        $log->setLevel(Log_level::getByName("debug")->getId());
        $log->setAction(Log_action::findeByName("db")->getId());
        $log->setTimestamp(date("Y-m-d H:i:s"));
        $log->setDescription("The Table " . $_POST["name"] . " has been droped  from the DB "  .M_postgresql::findeByName($_POST["db"])->getPgdatabase()  );
        $log->speichere();
        $this->setTemplate("info");

    }

    public function addConnection()
    {
        $m = new M_postgresql();
        $m->setPgdatabase($_POST["name"]);
        $m->setPguser($_POST["user"]);
        $m->setPghost($_POST["host"]);
        $m->setPgport($_POST["port"]);
        $m->setPgpw($_POST["pw"]);
        $m->setDescription($_POST["desc"]);
        $m->setUseredit($_SESSION["userid"]);
        $m->speichere();

        $log = new Log();
        $log->setUid($_SESSION["userid"]);
        $log->setLevel(Log_level::getByName("debug")->getId());
        $log->setAction(Log_action::findeByName("db")->getId());
        $log->setTimestamp(date("Y-m-d H:i:s"));
        $log->setDescription("New Connection added " . $m->getPgdatabase());
        $log->speichere();


        $this->setTemplate("info");
    }

    public function removeSrvMon() {
        $m = M_servicemonitor::finde($_POST["name"]);

        $log = new Log();
        $log->setUid($_SESSION["userid"]);
        $log->setLevel(Log_level::getByName("debug")->getId());
        $log->setAction(Log_action::findeByName("srvmon")->getId());
        $log->setTimestamp(date("Y-m-d H:i:s"));
        $log->setDescription("Service Monitor removed " . $m->getServicename());
        $log->speichere();
        $m->loesche();

    }


}