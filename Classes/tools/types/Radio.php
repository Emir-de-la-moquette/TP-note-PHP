<?php

declare(strict_types=1);

namespace tools\types;

use tools\types\MultiChoix;

class Radio extends MultiChoix {
    protected string $reponse;

    public function __construct(
        string $nom,
        string $texte,
        int $score,
        array $choix,
        string $reponse
    ){
        parent::__construct($nom,$texte,$score,$choix);
        $this->reponse = $reponse;
    }
    
    public function render(): string {
        $res = "<h2>$this->texte</h2><br>";
        foreach ($this->choix as $c) {
            $res .= "<input type='radio' id='$c' name='$this->nom' value='$c'><label for='$c'>$c</label>";
        }
        return $res."</br>";
    }

    public function comparerReponse(string $reponse): int {
        return $reponse==$this->reponse ? $this->score : 0;
    }
}
