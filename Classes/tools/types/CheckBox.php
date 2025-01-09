<?php

declare(strict_types=1);

namespace tools\types;

use tools\types\MultiChoix;

abstract class CheckBox extends MultiChoix {
    protected array $reponses;

    public function __construct(
        string $nom,
        string $texte,
        string $score,
        array $choix,
        array $reponses
    ){
        parent::__construct($nom,$texte,$score,$choix);
        $this->reponses = $reponses;
    }
    public function render(): string {
        $res = "<h2>$this->texte</h2>";
        foreach ($this->choix as $c) {
            $res += sprintf(
                '<input type="checkbox" id="%s" name="form[%s]" value="%s"><label for="%s">%s</label>',
                $c,
                $this->nom,
                $c,
                $c,
                $c);
        }
        return $res;
    }
    public function comparerReponse(array $reponses): float {
        return (count(array_intersect($reponses,$this->reponses))/count($this->reponses))*$this->score;
    }
}
