<?php

namespace App\Core;

class Db {

    protected $dbh;

    public function __construct() {
        include __DIR__ . '/../../Config/config.php';
        $this->dbh = new \PDO('mysql:host=' . $host . ';dbname=' . $dbname, $user, $password);
    }

    public function query($sql, $data=[]) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll();
    }

    public function queryLimit($sql, $first, $last) {
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(':first', (int) $first, \PDO::PARAM_INT);
        $sth->bindValue(':last', (int) $last, \PDO::PARAM_INT);
        $sth->execute();
        return $sth->fetchAll();
    }

}