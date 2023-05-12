<?php
require_once ('AbstractBase.php');
class ExecuteController extends AbstractBase {

    public function reboot()  {
        if(Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "rebootsystem") || Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "sudo") ) {
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
    }

    public function removeLog() {
        if(Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "deletepermission") || Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "sudo")){
            Log::finde($_GET["lid"])->loesche();
            var_dump($_GET["lid"]);
            exit();
        } else {
            $info = "No Permissions to Delete Logs";
        }
    }

    public function btnAddUserBerechtigung() {
       $q = new Qser_hat_berechtigung();
       $q->setUid(Qser::findeUserByName($_GET["name"])->getId());
       $q->setBid(Berechtigung::findeBerechtigungByNamed($_GET["perm"])->getId());
       $q->setUseredit($_SESSION["userid"]);
       $q->setCreatetime((date("Y-m-d H:i:s")));
       $q->speichere();

    }

}