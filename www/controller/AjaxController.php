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

            $user = Qser::findeALL();
            $this->addContext("user", $user);

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
            $permissions = 1;
        } else {
            $permissions = 1;
        }
        $this->addContext("perms", $permissions);


    }









}



?>
