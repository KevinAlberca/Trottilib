<?php
    spl_autoload_register(function ($classname){
    // Pour MAC OS X, on remplace le slash de la direction par un Backslash
        $path = __DIR__.'/Controller/'.$classname.'.php';
        $path = str_replace('\\', '/',$path);

        if (file_exists($path)){
            require_once $path;
        }
    });