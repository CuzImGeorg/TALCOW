<?php

    $_SESSION["userid"] = $user->getID();

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="view/rsrc/css/dashboard.css">
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



        <li onclick="loadMrgUser();">Users</li>

        <?php if($this->hasPermission("viewpermission") || $this->hasPermission("sudo")) { ?>
            <li onclick="loadPermissions();">Permissions</li>

        <?php } ?>

        <?php if($this->hasPermission("viewuserpermissions") || $this->hasPermission("sudo")) { ?>
            <li onclick="loadUserPermissions();">User Permissions</li>

        <?php } ?>

        <li onclick="loadSystemUser()">SystemUser</li>
        <li><a onclick="loadDockerModule()">Docker</a></li>
        <li><a onclick="loadSystemUser()">SystemUser</a></li>



        <li onclick="loadTerminal()"> >_ Terminal </li>
        <li onclick="loadServiceMonitor()">Daemon Monitor</li>




        <li onclick="loadSysInfo();">System Info </li>

    </ul>



    <div class="test123" id="maindiv"></div>
    </body>

</html>


