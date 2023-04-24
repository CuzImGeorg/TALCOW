<?php 
    require_once('src/funktionen.inc.php');
    require_once ('src/model/dbconn.php');

    spl_autoload_register('autoloadEntities');
    spl_autoload_register('autoloadTraits');
    spl_autoload_register('autoloadControllers');

    $aktion = $_GET['aktion'] ?? 'login';
    $controller = $_GET['controller'] ?? 'index';
    $controller = ucfirst($controller) . 'Controller';

    $controller = new $controller();
    if (method_exists($controller, $aktion)){
        $controller->run($aktion);
    }

?>



