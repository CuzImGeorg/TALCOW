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
        } else {
            $permissions = Qser_hat_berechtigung::findeALL();
        }
        $this->addContext("perms", $permissions);


    }

    public function logLevel() {
        $logs = Log_level::findeALL();
        $this->addContext("logs", $logs);
    }

    public function log() {
        $logs = Log::findeALL();
        $this->addContext("logs", $logs);


    }

    public function logAktions() {
        $akt = Log_action::findeALL();
        $this->addContext("akt", $akt);

    }










}



?>
