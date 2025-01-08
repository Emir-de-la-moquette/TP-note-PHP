<?php

declare(strict_types=1);

namespace tools;

abstract class Question{
    protected string $nom;
    protected string $texte;
    protected string $score;

    protected function __construct(
        string $nom,
        string $texte,
        string $score
    ){
        $this->nom = $nom;
        $this->texte = $texte;
        $this->score = $score;
    }

    public function __toString(): string {
        return $this->render();
    }

    public abstract function render(): string ;
}
