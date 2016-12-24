<?php

abstract class Field
{
    protected $name;
    protected $value;
    protected $editable;
    protected $tag;

    public function __construct($name = '')
    {
        $this->name     = $name;
        $this->editable = true;
        $this->tag      = new Tag();
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    function getValue()
    {
        return $this->value;
    }

    function setValue($value)
    {
        $this->value = $value;
    }

    function setStyleClass($styleClass)
    {
        $this->styleClass = $styleClass;
    }

    function setStyleId($styleId)
    {
        $this->styleId = $styleId;
    }

    function setStyleComplement($styleComplement)
    {
        $this->styleComplement = $styleComplement;
    }

    public function setEditable($boolean)
    {
        $this->editable = $boolean;
    }

    public function getEditable()
    {
        return $this->editable;
    }

    public function getTag()
    {
        return $this->tag;
    }

    public function input($type)
    {
        return "<input type='$type' name = '$this->name' value = '$this->value' ".$this->tag->getFormClass().$this->tag->getFormId().$this->tag->getFormComplemento()." />";
    }

    public abstract function show();
}