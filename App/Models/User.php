<?php

namespace App\Models;

use App\Core\Db;

class User {

    //public const TABLE = 'users';

    public $id;
    public $login;
    public $password;

    public function __construct($id = 0, $login = "", $password = "") {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
    }

    public static function find($login, $password) {
        $db = new Db();
        $sql = 'SELECT * FROM users WHERE login = :login AND password = :password LIMIT 1';
        $result = $db->query($sql, array('login' => $login, 'password' => $password));
        
        if (!$result) {
            return null;
        }
        else {
            $r = $result[0];
            $user = new self($r['id'], $r['login'], $r['password']);
            return $user;
        }
    }
}