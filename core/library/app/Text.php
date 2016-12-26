<?php

namespace core\library\app;

class Text extends Field
{

    public function __construct($name)
    {
        parent::__construct($name);
    }

    /**
     * @inheritDoc
     */
    public function show()
    {
        return $this->input('text');
    }
}