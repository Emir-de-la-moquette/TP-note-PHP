<?php

declare(strict_types=1);

namespace tools\types;
use tools\Question;

final class Text extends Question {
    private string $reponse;

    public function __construct(
        string $nom,
        string $texte,
        string $score,
        string $reponse
    ){
        parent::__construct($nom,$texte,$score);
        $this->reponse = $reponse;
    }

    public function render(): string {
        return sprintf(
            '<h2>%s</h2>',
            $this->texte)+
            sprintf(
                '<input type="text" name="form[%s]"',
                $this->nom);
    }
}
