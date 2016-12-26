<?php
  
require 'autoload.php';

use application\controller\Home as Home;


$class = (isset($_GET['class'])) ? $_GET['class'] : null;
$metodo = (isset($_GET['metodo'])) ? $_GET['metodo'] : null;
echo $class;
echo $metodo;
$controller = new Home();
        call_user_func($controller->$metodo, 33);
switch ($class) {
    case "home":
        $controller = new Home();
        $controller->$metodo;
        break;

    default:
        break;
}