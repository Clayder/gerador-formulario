<?php

namespace core\library\app;

class Select extends Field
{
    /*
     *  var array : Recebe os Options do select
     *  $options = array(
     *      0 => array(
     *              'value' => 122,
     *              'texto' => "popop",
     *           ),
     *      1 => array(
     *              'selected' => true
     *              'texto' => wqwqw
     *           ),
     *  );
     */
    private $options;
    private $texto;

    public function __construct($name, $options, $texto = '')
    {
        parent::__construct($name);
        $this->options = $options;
        $this->texto = $texto;
    }

    public function openSelect()
    {
        return "<select name = '$this->name' ".$this->tag->getFormClass().$this->tag->getFormId().$this->tag->getFormComplemento()." >";
    }

    public function closeSelect()
    {
        return "</select>";
    }

    public function getOptions()
    {
        $stringOpt = "";
        foreach ($this->options as $option) {
            if (isset($option['value'])) {
                $stringOpt = $stringOpt."<option value = '".$option['value']."'>".$option['texto']."</option>\n";
            } else if (isset($option['selected'])){
                $stringOpt = $stringOpt."<option selected = '".$option['selected']."'>".$option['texto']."</option>\n";
            }
        }
        return $stringOpt;
    }

    /**
     * @inheritDoc
     */
    public function show()
    {
        return "<span> $this->texto </span> "."\n".$this->openSelect() ."\n".$this->getOptions()."\n".$this->closeSelect();
    }
}