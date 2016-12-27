<?php

namespace application\controller;

use core\engine\Controller as Controller;
use application\model\Formulario as Formulario;


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
}