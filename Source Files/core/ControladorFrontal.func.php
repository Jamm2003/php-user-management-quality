<?php
// FUNCIONES PARA EL CONTROLADOR FRONTAL

function cargarControlador($controller) {
    $controlador = ucwords($controller) . 'Controller';
    $strFileController = 'controller/' . $controlador . ".php";

    if (!is_file($strFileController)) {
        $strFileController = 'controller/' . ucwords(CONTROLADOR_DEFECTO) . 'Controller.php';
    }

    require_once $strFileController;
    $controllerObj = new $controlador();
    return $controllerObj;
}
function cargarAccion($controllerObj, $action) {
    if ($controllerObj !== null && method_exists($controllerObj, $action)) {
        $controllerObj->$action();
    } else {
        die("Controller or action not found");
    }
}


function lanzarAccion($controllerObj) {
    if (isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])) {
        cargarAccion($controllerObj, $_GET["action"]);
    } else {
        cargarAccion($controllerObj, ACCION_DEFECTO);
    }
}
?>

