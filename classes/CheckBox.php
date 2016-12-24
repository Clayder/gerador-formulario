<?php

/**
 *
 */
class CheckBox extends Field
{
    private $texto;
    private $isChecked;
    public function __construct($name, $texto)
    {
        parent::__construct($name);
        $this->texto = $texto;
        $this->isChecked = false;
    }

    function getIsChecked()
    {
        return $this->isChecked;
    }

    function setIsChecked($isChecked)
    {
        $this->isChecked = $isChecked;
    }

    public function input($type){
        if($this->isChecked){
            return "<input type='$type' value = '$this->value' name = '$this->name' ".$this->tag->getFormClass().$this->tag->getFormId().$this->tag->getFormComplemento()." checked />";
        }else{
            return parent::input($type);
        }
    }
    /**
     * @inheritDoc
     */
    public function show()
    {
        return "<label> ".$this->input('checkbox') ." $this->texto </label>";
    }
}