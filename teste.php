<?php
include_once 'classes/Form.php';
include_once 'classes/Field.php';
include_once 'classes/Label.php';
include_once 'classes/Label.php';
include_once 'classes/Password.php';

$form = new Form('form', 'teste.php', 'post');
$form->getTag()->setFormClass('class1 class2 class3');
//$form->tag->setFormId('id');
//$form->tag->setFormComplemento(array('teste'=>'oi', 'teste3' => 'wewe'));
$label = new Label('testando');
$label->getTag()->setFormId('id');
$form->add($label);
$pas = new Password('senha');
$pas->getTag()->setFormId('id');
$pas->getTag()->setFormClass('class');
$style = array(
    'style' => "background-color: #00ff00; height: 50px;",
    'onclick' => 'alert()'
);
$pas->getTag()->setFormComplemento($style);
$form->add($pas);
$form->show();


