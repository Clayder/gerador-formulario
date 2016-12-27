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
                $novoCampo->getTag()->setFormId($campo->id);
                $novoCampo->getTag()->setFormClass($campo->class);
                $style = $this->complemento($campo->complemento);
                $novoCampo->getTag()->setFormComplemento($style);
                $form->add($novoCampo);
            } else if ($campo->tipo === "select") {
                $label     = new Label($campo->name);
                $form->add($label);
                $options   = $this->montarArrayOption($campo->option1,
                    $campo->option2, $campo->option3);
                $novoCampo = new Select($campo->name, $options, $campo->name);
                $novoCampo->getTag()->setFormId($campo->id);
                $novoCampo->getTag()->setFormClass($campo->class);
                $style     = $this->complemento($campo->complemento);
                $novoCampo->getTag()->setFormComplemento($style);
                $form->add($novoCampo);
            } else if ($campo->tipo === "radio") {
                $label     = new Label($campo->name);
                $form->add($label);
                $radios    = $this->montarArrayRadio($campo->radio1,
                    $campo->radio2, $campo->radio3);
                $novoRadio = new Radio($campo->name, $campo->name);
                $novoRadio->getTag()->setFormId($campo->id);
                $novoRadio->getTag()->setFormClass($campo->class);
                $style     = $this->complemento($campo->complemento);
                $novoRadio->getTag()->setFormComplemento($style);
                for ($i = 0; $i < count($radios); $i++) {
                    $novoRadio->setValue($radios[$i]->value);
                    $novoRadio->setTexto($radios[$i]->texto);
                    $form->add($novoRadio);
                }
            }
        }
        Arquivo::criar($form->show());

        Download::executar();
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
        if (isset($option1)) {
            $arrayOption[] = $option1;
        }if (isset($option2)) {
            $arrayOption[] = $option2;
        }if (isset($option3)) {
            $arrayOption[] = $option3;
        }
        return $arrayOption;
    }

    public function montarArrayRadio($radio1, $radio2, $radio3)
    {
        if (isset($radio1)) {
            $arrayRadio[] = $radio1;
        }if (isset($radio2)) {
            $arrayRadio[] = $radio2;
        }if (isset($radio3)) {
            $arrayRadio[] = $radio3;
        }
        return $arrayRadio;
    }
}