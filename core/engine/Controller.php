<?php
namespace core\engine;
class Controller
{
    // Caminha da pasta controller das suas filhas
    const CAMINHO_CONTROLLER = 'application\\controller\\';
    protected $view;
    public function __construct()
    {
        $this->view = new View();
    }

    // ucfirst: transforma a primeira letra em maiúsculo
    public static function callController($metodo, $class)
    {
        $class = ucfirst($class);
        if (class_exists(self::CAMINHO_CONTROLLER.$class)) {
            eval('$controller = new '.self::CAMINHO_CONTROLLER.$class.'() ;');
            if(method_exists(self::CAMINHO_CONTROLLER.$class, $metodo)){
                 eval('$controller->'.$metodo.'();');
            }else{
                echo "Esse método não existe";
            }
        } else {
            echo "Essa classe não existe";
        }
    }
}