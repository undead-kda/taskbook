<?php

namespace App\Core;

class Controller {

    private $member;

    public function __set($name, $val) {
        $this->member[$name] = $val;
    }

    public function __get($name) {
        return $this->member;
    }
}