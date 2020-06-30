<?php

namespace App\Core;

abstract class TSingletone {

    protected static $instance;

    public static function getInstance() {
        if(static::$instance === null) {
            static::$instance = new static;
        }
        return static::$instance;
    }

}