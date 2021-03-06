<?php

namespace core\library\app;

/**
 * Classe responsável por exibir um texto na tela
 */
class Label extends Field
{

    /**
     * @var String recebe o texto do label
     */
    private $texto;

    /**
     * @param String $texto
     */
    public function __construct($texto)
    {
        parent::__construct();
        $this->texto = $texto;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @inheritDoc
     */
    public function show()
    {
        print_r($this->tag->getFormComplemento());
       return "<label ". $this->tag->getFormClass() . $this->tag->getFormId(). $this->tag->getFormComplemento() . "> $this->texto </label>";
    }
}
