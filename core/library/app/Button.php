<?php
namespace core\library\app;
class Button extends Field
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
        return $this->input('submit');
    }
}