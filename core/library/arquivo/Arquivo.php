<?php

namespace core\library\arquivo;

class Arquivo
{
    public static function criar($conteudo){
        file_put_contents('formulario.html', $conteudo);
    }
}