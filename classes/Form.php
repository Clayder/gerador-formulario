<?php
include_once 'Tag.php';
/*
 * Classe para construção de formulários
 */

class Form
{
    // array de objetos contidos pelo form
    protected $filds;
    // nome do formulário
    private $nome;
    private $action;
    private $method;
    private $tag;

    function __construct($nome = 'my_form', $action = null, $method = null)
    {
        $this->nome   = $nome;
        $this->action = $action;
        $this->method = $method;
        $this->tag    = new Tag();
        $this->filds  = array();
    }

    public function getTag()
    {
        return $this->tag;
    }

    public function getAction()
    {
        if ($this->action != null) {
            return "action = '$this->action' ";
        } else {
            return $this->action;
        }
    }

    public function getMethod()
    {
        if ($this->method != null) {
            return "method = '$this->method' ";
        } else {
            return $this->method;
        }
    }

    public function getNome()
    {
        if ($this->nome != null) {
            return "name = '$this->nome' ";
        } else {
            return $this->nome;
        }
    }

    function setAction($action)
    {
        $this->action = $action;
    }

    function setMethod($method)
    {
        $this->method = $method;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    /*
     * Adiciona um objeto ao formulário
     */

    public function add(Field $object)
    {
        $this->filds[] = $object->show();
    }
    /*
     * Exibir o formulário
     */

    public function show()
    {
       return $this->openForm(). "\n" . $this->getFields().$this->closeForm();
    }

    public function openForm()
    {
        return "<form ".$this->getAction().$this->getNome().$this->getMethod().$this->tag->getFormClass().$this->tag->getFormId().$this->tag->getFormComplemento().">";
    }

    public function closeForm()
    {
        return "</form>";
    }

    public function getFields()
    {
        $string = "";
        foreach ($this->filds as $fild) {
            $string = $string . $fild . "<br/> \n";
        }
        return $string;
    }
}