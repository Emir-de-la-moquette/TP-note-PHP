<?php

declare(strict_types=1);

namespace tools\types;

use tools\Question;

abstract class MultiChoix extends Question {
    protected array $choix;

    public function __construct(
        string $nom,
        string $texte,
        string $score,
        array $choix
    ){
        parent::__construct($nom,$texte,$score);
        $this->choix = $choix;
    }
}
