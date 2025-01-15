<?php

declare(strict_types=1);

namespace tools\types;

use tools\types\MultiChoix;

class CheckBox extends MultiChoix {
    protected array $reponses;

    public function __construct(
        string $nom,
        string $texte,
        int $score,
        array $choix,
        array $reponses
    ){
        parent::__construct($nom,$texte,$score,$choix);
        $this->reponses = $reponses;
    }

    public function render(): string {
        $res = "<h2>$this->texte</h2><br>";
        foreach ($this->choix as $c) {
            $res .= "<input type='checkbox' id='$c' name='$this->nom[]' value='$c'><label for='$c'>$c</label>";
        }
        return $res."</br>";
    }
    
    public function comparerReponse(array $reponses): float {
        return (count(array_intersect($reponses,$this->reponses))/count($this->reponses))*$this->score;
    }
}
