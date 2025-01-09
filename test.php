<?php
declare(strict_types=1);

require 'Classes/autoLoader.php';

AutoLoader::register();


use tools\types\Radio;
use tools\types\Text;
use tools\types\CheckBox;

$question_text = new Text('questionText','Qui es-tu ?',2,'ui');
$question_radio = new Radio('questionRadio','Qui es-tu ?',2,['moi','twa','ui','UwU'],'ui');
$question_checkBox = new CheckBox('questionCheck','Qui es-tu ?',6,['OwO','>w<','-w-',';w;'],['OwO','>w<']);

echo $question_text;
echo $question_radio;
echo $question_checkBox;
