<?php

class AutoLoader{
    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }

    static function autoload($fqcn){
        $path = str_replace('\\', '/', $fqcn).'.php';
        require __DIR__.'/../Classes/'.$path;
    }
}
