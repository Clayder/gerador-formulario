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
        return $this->input('password');
    }
}
