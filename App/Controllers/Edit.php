<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;

class Edit extends Controller {

    public function index() {
        $task = Task::findById($_GET['page']);
        if (!$task) header("Location: /tasklist");
        $this->author = $task->name;
        $this->authorEmail = $task->email;
        $this->content = $task->content;
        $this->id = $task->id;
        if ($task->status == 1) $this->checked = 'checked'; else $this->checked = '';
    }
}