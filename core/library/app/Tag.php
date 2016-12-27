<?php
namespace core\library\app;
class Tag
{
    private $formId;
    // @var String
    private $formClass;
    // @var String
    private $formComplemento;

    function __construct()
    {
        $this->formId          = '';
        $this->formClass       = '';
        $this->formComplemento = "";
    }

    public function getFormId()
    {
        if ($this->formId != '') {
            return "id = '$this->formId' ";
        } else {
            return $this->formId;
        }
    }

    public function getFormClass()
    {
        if ($this->formClass != '') {
            return "class = '$this->formClass' ";
        } else {
            return $this->formClass;
        }
    }

    function getFormComplemento()
    {
        return $this->formComplemento;
    }

    function setFormId($formId)
    {
        $this->formId = $formId;
    }

    function setFormClass($class)
    {
        $this->formClass = $this->formClass.$class;
    }

    function setFormComplemento($novoComplemento)
    {
        $this->formComplemento = $novoComplemento;
    }
}