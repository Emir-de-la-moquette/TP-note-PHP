<?php

declare(strict_types=1);

namespace tools\types;
use tools\Question;

final class Text extends Question {
    private string $reponse;

    public function __construct(
        string $nom,
        string $texte,
        int $score,
        string $reponse
    ){
        parent::__construct($nom,$texte,$score);
        $this->reponse = $reponse;
    }

    public function render(): string {
        return "<h2>$this->texte</h2><input type='text' name='$this->nom'>";
    }
    
    public function comparerReponse(string $reponse): int {
        return $reponse==$this->reponse ? $this->score : 0;
    }
}
