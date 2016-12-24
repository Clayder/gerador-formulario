<?php

class Arquivo
{
    private $conteudo;

    public static function criar($conteudo){
        file_put_contents('formulario.html', $conteudo);
    }
}