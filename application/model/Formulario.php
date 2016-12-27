<?php

namespace application\model;

use core\library\app\Form as Form;
use core\library\app\Label as Label;
use core\library\app\Password as Password;
use core\library\app\Hidden as Hidden;
use core\library\app\Text as Text;
use core\library\app\File as File;
use core\library\app\CheckBox as CheckBox;
use core\library\app\Select as Select;
use core\library\app\Button as Button;
use core\library\app\Radio as Radio;
use core\library\arquivo\arquivo as Arquivo;
use core\library\download\download as Download;

class Formulario
{
    private $campos;

    function __construct($campos)
    {
        $this->campos = $campos;
    }

    public function criar()
    {
        $form = new Form('form', 'teste.php', 'post');
        foreach ($this->campos as $campo) {
            $label = new Label($campo->name);
            $form->add($label);
            if ($campo->tipo === "input") {
                switch ($campo->inputTipo) {
                    case "file":
                        $novoCampo = new File($campo->name);
                        break;
                    case "hidden":
                        $novoCampo = new Hidden($campo->name);
                        break;
                    case "pasword":
                        $novoCampo = new Password($campo->name);
                        break;
                    case "text":
                        $novoCampo = new Text($campo->name);
                        break;
                    case "textarea":
                        $novoCampo = new TextArea($campo->name);
                        break;

                    default:
                        break;
                }
                $novoCampo->getTag()->setFormId($campo->id);
                $novoCampo->getTag()->setFormClass($campo->class);
                $style = $this->complemento($campo->complemento);
                $novoCampo->getTag()->setFormComplemento($style);
                $form->add($novoCampo);
            }else if($campo->tipo === "select"){
                //$novoCampo = new Select($campo->name);
            }
        }
        Arquivo::criar($form->show());

        //Download::executar();
    }

    public function complemento($complemento)
    {
        if (strripos($complemento, "|")) {
            $complemento  = explode("|", $complemento);
            $complemento = implode(" ", $complemento);
        }
        return $complemento;
    }
}