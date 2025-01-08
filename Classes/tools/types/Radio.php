<?php

declare(strict_types=1);

namespace tools\types;

use tools\types\MultiChoix;

abstract class CheckBox extends MultiChoix {
    protected string $reponse;

    public function __construct(
        string $nom,
        string $texte,
        string $score,
        array $choix,
        string $reponse
    ){
        parent::__construct($nom,$texte,$score,$choix);
        $this->reponse = $reponse;
    }
    public function render(): string {
        $res = "<h2>$this->texte</h2>";
        foreach ($this->choix as $c) {
            $res += sprintf(
                '<input type="radio" id="%s" name="form[%s]" value="%s"><label for="%s">%s</label>',
                $c,
                $this->nom,
                $c,
                $c,
                $c);
        }
        return $res;
    }
}