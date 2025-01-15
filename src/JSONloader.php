<?php

function getQuestions($nom){
    $source = __DIR__.'/../data/quiz/'.$nom;
    $content = file_get_contents($source);
    $questions = json_decode($content, true);

    if(empty($questions)){
        throw new Exception('Pas de questions sur ce quiz');
    }
    return $questions;
}

function getNomQuestions($nom){
    $questions = getQuestions($nom);
    $names=[];
    foreach($questions as $quest){
        if(!in_array($quest['nom'], $names)){
            $names[]=$quest['nom'];
        }
    }
    return $names;  
}

?>