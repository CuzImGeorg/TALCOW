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









}



?>
