<?php

    $_SESSION["userid"] = $user->getID();

?>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="view/rsrc/css/dashboard.css">
        <script src="view/rsrc/js/dashboard.js"></script>
    </head>
    <body>
    <ul>
        <li><a href="index.php?">Home</a></li>
        <li><a onclick="loadLogs();">Logs</a></li>
        <li><a onclick="loadlogAktions();">Log Actions</a></li>

        <li><a onclick="loadMrgUser();">Users</a></li>
        <li><a onclick="loadPermissions();">Permissions</a></li>
        <li><a onclick="loadUserPermissions();">User Permissions</a></li>



        <li><a href="index.php?">News</a></li>
        <li><a href="index.php?">Contact</a></li>




        <li><a onclick="loadSysInfo();">System Info</a></li>

    </ul>

    <div class="test123" id="maindiv"></div>

    </body>

</html>


