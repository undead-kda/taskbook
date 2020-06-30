<?php

namespace App\Models;

class Auth {

    public function validData($login, $password) {
        $data = \App\Models\User::find($login, $password);
        return $data;
    }
}