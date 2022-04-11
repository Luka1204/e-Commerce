<?php
session_start();

require_once'autoload.php';
require_once 'Config/db.php';
require_once 'Helpers/utils.php';
require_once 'Config/parameters.php';
require_once'Views/Layout/header.php';
require_once'Views/Layout/sidebar.php';

//Conexion base de datos
$db = Database::connect();

function showError(){
    $error = new errorController();
    $error->index();
}


if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller'].'Controller';
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $nombre_controlador = controller_default; 
}
else{
    showError();
    exit();
}
if(class_exists($nombre_controlador)){

    $controlador = new $nombre_controlador;
    
    if(isset($_GET['action']) && method_exists($controlador , $_GET['action'])){
    $action = $_GET['action'];
    $controlador->$action();
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    $default = action_default;
       $controlador->$default();

}
else{
     showError();
}

}else{
    showError();

}



require_once'Views/Layout/footer.php';

?>

