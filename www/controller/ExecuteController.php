<?php
require_once ('AbstractBase.php');
class ExecuteController extends AbstractBase {

    public function reboot()  {
        if(Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["user"]->getID(), "rebootsystem") || Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["user"]->getID(), "rebootsystem") )
        exec("sudo reboot");
    }

}