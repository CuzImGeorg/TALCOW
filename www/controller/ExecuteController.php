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
            $this->setTemplate("info");
        }
    }



    public function dluser(){
        if($this->hasPermission("deleteuser") || $this->hasPermission("sudo")) {
            $o = shell_exec("deluser " . $_POST['name']);
            $this->addContext("info", $o);
            $this->setTemplate("info");
        }
    }

    public function changeUserName() {
        if($this->hasPermission("changeusername") || $this->hasPermission("sudo")) {
            $u = Qser::finde($_POST["uid"]);
            $u->setName($_POST["name"]);
            $u->speichere();
            $this->setTemplate("info");
        }
    }
    public function changeUserpw() {
        $u = Qser::finde($_POST["uid"]);
        $u->setPassword($_POST["pw"]);
        $u->speichere();
        $this->setTemplate("info");
    }

    public function changeSystemUserName() {
        if($this->hasPermission("changesysusername") || $this->hasPermission("sudo")) {

            shell_exec("usermod -l " . $_POST["name"] . " " . Qser::finde($_POST["uid"]->getName()));
            $this->setTemplate("info");
        }
    }

    public function changesysuserpw() {
        if($this->hasPermission("changesysuserpw") || $this->hasPermission("sudo")) {

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
        $this->setTemplate("info");

    }

    public function addConnection() {
        $m = new M_postgresql();
        $m->setPgdatabase($_POST["name"]);
        $m->setPguser($_POST["user"]);
        $m->setPghost($_POST["host"]);
        $m->setPgport($_POST["port"]);
        $m->setPgpw($_POST["pw"]);
        $m->setDescription($_POST["desc"]);
        $m->setUseredit($_SESSION["userid"]);
        $m->speichere();
        $this->setTemplate("info");

    }






}