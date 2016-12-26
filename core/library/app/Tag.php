<?php
namespace core\library\app;
class Tag
{
    private $formId;
    // @var String
    private $formClass;
    // @var array associativo
    private $formComplemento;

    function __construct()
    {
        $this->formId          = '';
        $this->formClass       = '';
        $this->formComplemento = array();
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
        $tag = "";
        foreach ($this->formComplemento as $key => $value) {
            $tag = $tag." $key = '$value'";
        }
        return $tag." ";
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
        $this->formComplemento = array_merge($this->formComplemento,
            $novoComplemento);
    }
}