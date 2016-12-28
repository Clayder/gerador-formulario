<?php
require 'autoload.php';

use core\engine\Controller as Controller;
use application\controller\Home as Home;
// Armazena o nome do controlador que será chamado
$class  = (isset($_GET['class'])) ? $_GET['class'] : null;
// armazena o nome do método que será chamado
$metodo = (isset($_GET['metodo'])) ? $_GET['metodo'] : null;

if ($class == null) {
    $metodo = "index";
    $class = PAGINA_INICIAL;
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $dados = $_POST['dados'];
    $conteudoForm = json_decode($dados);
    $form = new Home();
    $form->form($conteudoForm);
}

// Chama o controller e retorna o conteúdo do método
Controller::callController($metodo, $class);



