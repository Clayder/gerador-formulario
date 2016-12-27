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
    //$dados = '[{"inputTipo":"hidden", "tipo":"input","name":"xzx","value":"zxz","class":"xzxz","id":"xzx","complemento":"style = color: \'#00ff00\' | onclick = \'alert()\'"},{"tipo":"select","name":"xzx","class":"zxz","id":"xzx","complemento":"zxzxz","option1":{"texto":"zx","value":"zxz"},"option2":{"texto":"xzx","value":"xzxzz"},"option3":{"texto":"xzx","value":"zxzxzxz"}},{"tipo":"radio","name":"xzx","class":"zxzx","id":"zxzx","complemento":"zxzxzxz","radio1":{"texto":"xzxz","value":"xzxzx"},"radio2":{"texto":"zzzzz","value":"zxz"},"radio3":{"texto":"xzxz","value":"xzxz"}}]';
    $conteudoForm = json_decode($dados);
    $form = new Home();
    $form->form($conteudoForm);
}

// Chama o controller e retorna o conteúdo do método
Controller::callController($metodo, $class);



