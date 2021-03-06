<?php

namespace application\controller;

use core\engine\Controller as Controller;
use application\model\Formulario as Formulario;
use core\library\download\Download as Download;

class Home extends Controller
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render("header");
        $this->view->render("conteudo", array());
        $this->view->render("footer");
    }

    public function form($campos){
        $formulario = new Formulario($campos);
        $formulario->criar();
    }

    public function baixar_formulario(){
         Download::executar();
    }
}