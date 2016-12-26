<?php

require 'autoload.php';

use core\library\app\Form as Form;
use core\library\app\Label as Label;
use core\library\app\Password as Password;
use core\library\app\Hidden as Hidden;
use core\library\app\Text as Text;
use core\library\app\File as File;
use core\library\app\CheckBox as CheckBox;
use core\library\app\Select as Select;
use core\library\app\Button as Button;
use core\library\app\Radio as Radio;
use core\library\arquivo\arquivo as Arquivo;
use core\library\download\download as Download;

echo base_url();
$form   = new Form('form', 'teste.php', 'post');
$form->getTag()->setFormClass('class1 class2 class3');


$label  = new Label('testando');
$label->getTag()->setFormId('id');
$form->add($label);

$pas    = new Password('senha');
$pas->getTag()->setFormId('id');
$pas->getTag()->setFormClass('class');
$style  = array(
    'style' => "background-color: #00ff00; height: 50px;",
    'onclick' => 'alert()'
);
$pas->getTag()->setFormComplemento($style);
$form->add($pas);
/* Hidden */
$hidden = new Hidden('hidden');
$hidden->getTag()->setFormId('id');
$hidden->getTag()->setFormClass('class');
$style  = array(
    'style' => "background-color: #00ff00; height: 50px;",
    'onclick' => 'alert()'
);
$hidden->getTag()->setFormComplemento($style);
$form->add($hidden);
/* Text */
$text   = new Text('hidden');
$text->getTag()->setFormId('id');
$text->getTag()->setFormClass('class');
$style  = array(
    'style' => "background-color: #00ff00; height: 50px;",
    'onclick' => 'alert()'
);
$text->getTag()->setFormComplemento($style);
$form->add($text);

/* File */
$t     = new File('file');
$t->getTag()->setFormId('id');
$t->getTag()->setFormClass('class');
$style = array(
    'style' => "background-color: #00ff00; height: 50px;",
    'onclick' => 'alert()'
);
$t->getTag()->setFormComplemento($style);
$form->add($t);

/* CheckBox */
$t2    = new CheckBox('checkbox', "ererre");
$t2->getTag()->setFormId('id');
$t2->getTag()->setFormClass('class');
$t2->setIsChecked(true);
$style = array(
    'style' => "background-color: #00ff00;",
    'onclick' => 'alert()'
);
$t2->getTag()->setFormComplemento($style);
$form->add($t2);


/* CheckBox */
$options = array(
    0 => array(
        'value' => 0,
        'texto' => 'Zero'
    ),
    1 => array(
        'value' => 1,
        'texto' => 'Um'
    ),
    2 => array(
        'selected' => 2,
        'texto' => 'Dois'
    ),
);
$t2      = new Select('select', $options, 'Estados');
$t2->getTag()->setFormId('id');
$t2->getTag()->setFormClass('class');

$style = array(
    'style' => "background-color: #00ff00;",
);
$t2->getTag()->setFormComplemento($style);
$form->add($t2);

/* Radio */
$t3    = new Radio('radio', "ererre");
$t3->getTag()->setFormId('id');
$t3->getTag()->setFormClass('class');
$t3->setIsChecked(true);
$style = array(
    'style' => "background-color: #00ff00;",
    'onclick' => 'alert()'
);
$t3->getTag()->setFormComplemento($style);
$form->add($t3);

$t4 = new Radio('radio', "ererre");
$form->add($t4);

/* button */
$hidden = new Button('enviar');
$hidden->getTag()->setFormId('id');
$hidden->getTag()->setFormClass('class');
$hidden->setValue("Enviar");
$style  = array(
    'style' => "background-color: #00ff00; height: 50px;",
    'onclick' => 'alert()'
);
$hidden->getTag()->setFormComplemento($style);
$form->add($hidden);

echo $form->show();

Arquivo::criar($form->show());

//Download::executar();
