<?php

namespace core\engine;

class Controller
{
    private $method;
    private $class;

    public function __construct($method, $class)
    {
        $this->method = $method;
        $this->class  = $class;
    }

    public function executar(){
        $newClass = new $class;
        $newClass->$method;
    }
}