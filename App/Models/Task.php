<?php

namespace App\Models;

use App\Core\Db;

class Task {

    //public const TABLE = 'tasks';

    public $id;
    public $name;
    public $email;
    public $content;

    public function __construct($id = 0, $name = "", $email = "", $content = "", $status = 0) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->content = $content;
        $this->status = $status;
    }

    public function add() {
        $db = new Db();
        $sql = "INSERT INTO tasks (name, email, content, status) VALUES (:name, :email, :content, :status)";
        $data = array('name' => $this->name, 'email' => $this->email, 'content' => $this->content, 'status' => $this->status);
        $result = $db->query($sql, $data);

        return $result;
    }

    public function update() {
        $db = new Db();
        $sql = "UPDATE tasks SET content = :content, status = :status WHERE id = :id";
        $data = array('id' => $this->id, 'content' => $this->content, 'status' => $this->status);
        $result = $db->query($sql, $data);

        return $result;
    }

    public static function findAll() {
        $db = new Db();
        $sql = "SELECT * FROM tasks";
        
        return $db->query($sql);
    }

    public static function findById($id) {
        $db = new Db();
        $sql = "SELECT * FROM tasks WHERE id = :id";

        $result = $db->query($sql, array('id' => $id));
        
        if (!$result) {
            return null;
        }
        else {
            $r = $result[0];
            $task = new self($r['id'], $r['name'], $r['email'], $r['content'], $r['status']);
            return $task;
        }
    }

    public static function recCount() {
        $db = new Db();
        $sql = "SELECT COUNT(*) FROM tasks";

        $result = $db->query($sql);
        $result = $result[0];

        return $result;
    }

    public static function findAllByPages($interval = 3, $page = 1, $sort = 0) {
        $db = new Db();
        $first = ($page - 1) * $interval;
        $last = $first + $interval - 1;
        if ($sort == 0) $orderby = 'name'; else $orderby = 'status';
        $sql = "SELECT * FROM tasks ORDER BY " . $orderby . " DESC LIMIT :first, :last";
        $result = $db->queryLimit($sql, $first, $interval);

        return $result;

    }

}