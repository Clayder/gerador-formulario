<?php


/**
 *
 */
class Password extends Field
{

    function __construct($name)
    {
        parent::__construct($name);
    }

    /**
     * @inheritDoc
     */
    public function show()
    {
        return "<input type='pasword' name = '$this->name' ". $this->tag->getFormClass() . $this->tag->getFormId(). $this->tag->getFormComplemento() . " />";
    }
}
