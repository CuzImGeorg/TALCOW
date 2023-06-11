<?php

$_SESSION["userid"] = $user->getID();

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="view/rsrc/css/dashboard.css">
        <link rel="stylesheet" href="view/rsrc/css/popup.css">
        <link rel="icon" type="image/x-icon" href="view/rsrc/icon.png">
        <script src="view/rsrc/js/dashboard.js"></script>
        <script src="view/rsrc/js/fun.js"></script>

    </head>
    <body>
    <ul class="dashboardnavlist">
        <li> <a href="index.php?">Home</a></li>

        <?php if(Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "readlog")
                || Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "sudo")){ ?>
                 <li onclick="b2=false;b3 = true;b4 = false;loadLogs();">Logs</li>
        <?php } ?>
        <?php if(Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "readlog")
            || Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "sudo")){ ?>
            <li onclick="loadlogAktions();">Log Actions</li>
        <?php } ?>
        <?php if(Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "readlog")
            || Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "sudo")){ ?>
            <li onclick="loadloglevel();">Log Levels</li>
        <?php } ?>


        <?php if($this->hasPermission("showuser") || $this->hasPermission("sudo")) {?>
            <li onclick="loadMrgUser();">Users</li>
        <?php } ?>


        <?php if($this->hasPermission("viewpermission") || $this->hasPermission("sudo")) { ?>
            <li onclick="loadPermissions();">Permissions</li>

        <?php } ?>

        <?php if($this->hasPermission("viewuserpermissions") || $this->hasPermission("sudo")) { ?>
            <li onclick="loadUserPermissions();">User Permissions</li>

        <?php } ?>


        <?php if($this->hasPermission("showsysuser") || $this->hasPermission("sudo")) {?>
            <li onclick="loadSystemUser()">SystemUser</li>
        <?php } ?>

        <?php if($this->hasPermission("managemodules") || $this->hasPermission("sudo")) {?>
        <li  onclick="loadModule()">Module</li>
        <li class="navmodule" style="border: none;background-color: rgba(0, 0, 0, 0);">
            <ul class="submodlules">
                <li class="loadsubmodules" id="btnm" onclick="loadInstalledModules()">+</li>
                <?php if($this->hasPermission("showpgdatabases") || $this->hasPermission("sudo")) {?>
                    <li hidden onclick="loadPostgreSQL()" name="m">PostgreSQL</li>
                <?php } ?>
            </ul>
        </li>
            <li onclick="loadWebTerminal()">WebTerminal</li>
        <?php } ?>



        <?php if($this->hasPermission("showterminal") || $this->hasPermission("sudo")) {?>
            <li onclick="loadTerminal()"> >_ Terminal </li>
        <?php } ?>

        <?php if($this->hasPermission("servicemonitor") || $this->hasPermission("sudo")) {?>
            <li onclick="loadServiceMonitor()">Daemon Monitor</li>
        <?php } ?>



        <?php if($this->hasPermission("showsysinfo") || $this->hasPermission("sudo")) {?>
        <li onclick="loadSysInfo();">System Info </li>
        <?php } ?>

    </ul>



    <div onclick="document.getElementById('infopopup').setAttribute('hidden' , '');document.getElementById('infopopup').innerHTML ='';" hidden class="pop" id="infopopup">
    </div>

    <div class="test123" id="maindiv"></div>
    </body>

</html>


