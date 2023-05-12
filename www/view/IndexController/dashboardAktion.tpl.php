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
    <ul>
        <li><a href="index.php?">Home</a></li>

        <?php if(Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "readlog")
                || Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "sudo")){ ?>
                 <li><a onclick="b2=false;b3 = true;loadLogs();">Logs</a></li>
        <?php } ?>
        <?php if(Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "readlog")
            || Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "sudo")){ ?>
            <li><a onclick="loadlogAktions();">Log Actions</a></li>
        <?php } ?>
        <?php if(Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "readlog")
            || Qser_hat_berechtigung::findeByUidAndBerechtigungsName($_SESSION["userid"], "sudo")){ ?>
            <li><a onclick="loadloglevel();">Log Levels</a></li>
        <?php } ?>



        <li><a onclick="loadMrgUser();">Users</a></li>
        <li><a onclick="loadPermissions();">Permissions</a></li>
        <li><a onclick="loadUserPermissions();">User Permissions</a></li>



        <li><a href="index.php?">News</a></li>
        <li><a href="index.php?">Contact</a></li>




        <li ><a onclick="loadSysInfo();">System Info</a></li>

    </ul>

    <div class="test123" id="maindiv"></div>

    </body>

</html>


