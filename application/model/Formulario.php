<?php

namespace application\model;

use core\library\app\Form as Form;
use core\library\app\Label as Label;
use core\library\app\Password as Password;
use core\library\app\Hidden as Hidden;
use core\library\app\Text as Text;
use core\library\app\TextArea as TextArea;
use core\library\app\File as File;
use core\library\app\CheckBox as CheckBox;
use core\library\app\Select as Select;
use core\library\app\Button as Button;
use core\library\app\Radio as Radio;
use core\library\arquivo\Arquivo as Arquivo;


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
        echo "<pre>";
        print_r($this->campos);
        echo "</pre>";
        foreach ($this->campos as $campo) {
            $id          = (isset($campo->id)) ? $campo->id : "";
            $class       = (isset($campo->class)) ? $campo->class : "";
            $complemento = (isset($campo->complemento)) ? $campo->complemento : "";
            if ($campo->tipo === "input") {
                switch ($campo->inputTipo) {
                    case "file":
                        $label     = new Label($campo->name);
                        $form->add($label);
                        $novoCampo = new File($campo->name);
                        break;
                    case "hidden":
                        $novoCampo = new Hidden($campo->name);
                        break;
                    case "password":
                        $label     = new Label($campo->name);
                        $form->add($label);
                        $novoCampo = new Password($campo->name);
                        break;
                    case "text":
                        $label     = new Label($campo->name);
                        $form->add($label);
                        $novoCampo = new Text($campo->name);
                        break;
                    case "textarea":
                        $label     = new Label($campo->name);
                        $form->add($label);
                        $novoCampo = new TextArea($campo->name);
                        break;
                    default:
                        break;
                }

                $novoCampo->getTag()->setFormId($id);
                $novoCampo->getTag()->setFormClass($class);
                $style = $this->complemento($complemento);
                $novoCampo->getTag()->setFormComplemento($style);
                $form->add($novoCampo);
            } else if ($campo->tipo === "select") {
                $label     = new Label($campo->name);
                $form->add($label);
                $option1   = (isset($campo->option1)) ? $campo->option1 : null;
                $option2   = (isset($campo->option2)) ? $campo->option2 : null;
                $option3   = (isset($campo->option3)) ? $campo->option3 : null;
                $options   = $this->montarArrayOption($option1, $option2,
                    $option3);
                $novoCampo = new Select($campo->name, $options, $campo->name);
                $novoCampo->getTag()->setFormId($id);
                $novoCampo->getTag()->setFormClass($class);
                $style     = $this->complemento($complemento);
                $novoCampo->getTag()->setFormComplemento($style);
                $form->add($novoCampo);
            } else if ($campo->tipo === "radio") {
                $label     = new Label($campo->name);
                $form->add($label);
                $radio1    = (isset($campo->radio1)) ? $campo->radio1 : null;
                $radio2    = (isset($campo->radio2)) ? $campo->radio2 : null;
                $radio3    = (isset($campo->radio3)) ? $campo->radio3 : null;
                $radios    = $this->montarArrayRadio($radio1, $radio2, $radio3);
                $novoRadio = new Radio($campo->name, $campo->name);
                $novoRadio->getTag()->setFormId($id);
                $novoRadio->getTag()->setFormClass($class);
                $style     = $this->complemento($complemento);
                $novoRadio->getTag()->setFormComplemento($style);
                for ($i = 0; $i < count($radios); $i++) {
                    $novoRadio->setValue($radios[$i]->value);
                    $novoRadio->setTexto($radios[$i]->texto);
                    $form->add($novoRadio);
                }
            }
        }
        Arquivo::criar($form->show());  
    }

    public function complemento($complemento)
    {
        if (strripos($complemento, "|")) {
            $complemento = explode("|", $complemento);
            $complemento = implode(" ", $complemento);
        }
        return $complemento;
    }

    public function montarArrayOption($option1, $option2, $option3)
    {
        if ($option1 != null) {
            $arrayOption[] = $option1;
        }if ($option2 != null) {
            $arrayOption[] = $option2;
        }if ($option3 != null) {
            $arrayOption[] = $option3;
        }
        return $arrayOption;
    }

    public function montarArrayRadio($radio1, $radio2, $radio3)
    {
        if ($radio1 != null) {
            $arrayRadio[] = $radio1;
        }if ($radio2 != null) {
            $arrayRadio[] = $radio2;
        }if ($radio3 != null) {
            $arrayRadio[] = $radio3;
        }
        return $arrayRadio;
    }
}