<?php
    session_start();
    $_SESSION["user"] = $u;
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
        <li><a href="index.phpa?">Home</a></li>
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


