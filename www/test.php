<?php
require_once('model/funktionen.inc.php');
require_once('model/dbconn.php');


    spl_autoload_register('autoloadEntities');
    spl_autoload_register('autoloadTraits');
    spl_autoload_register('autoloadControllers');

    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Test</title>

</head>
<body>
<p>test von <?php
    var_dump(Qser::finde(1));   ?></p>
<p>test von <?php
    var_dump(Log::findLogByLog_Action(1));   ?></p>
<p>test von <?php
    var_dump(Log::findLogByLog_Level(1));   ?></p>

</body>
</html>
