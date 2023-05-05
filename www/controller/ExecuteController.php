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

}