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
            $u->setName($_POST["name"]);
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
        $m = new M_servicemonitor();
        $m->setServicename($_POST["name"]);
        $m->setDescription($_POST["desc"]);
        $m->setUid($_SESSION["userid"]);
        $m->setServicetype($_POST["st"]);
        $m->speichere();
        $this->setTemplate("info");

    }



    public function dluser(){
        shell_exec("deluser " . $_POST['name']);
        $this->setTemplate("info");

    }

    public function changeUserName() {
        $u = Qser::finde($_POST["uid"]);
        $u->setName($_POST["name"]);
        $u->speichere();
        $this->setTemplate("info");

    }
    public function changeUserpw() {
        $u = Qser::finde($_POST["uid"]);
        $u->setPassword($_POST["pw"]);
        $u->speichere();
        $this->setTemplate("info");
    }

    public function changeSystemUserName() {
        shell_exec("usermod -l " . $_POST["name"] . " " . Qser::finde($_POST["uid"]->getName()));
        $this->setTemplate("info");
    }





}