<?php

namespace core\library\app;

class TextArea extends Field
{

    public function __construct($name)
    {
        parent::__construct($name);
    }

    public function input()
    {
        return "<textarea name = '$this->name' ".$this->tag->getFormClass().$this->tag->getFormId().$this->tag->getFormComplemento()."> $this->value </textarea>";
    }

    /**
     * @inheritDoc
     */
    public function show()
    {
        return $this->input();
    }
}