<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;

class Update extends Controller {

    public function index() {
        if (isset($_POST['status'])) $status = 1; else $status = 0;
        $id = $_POST['id'];
        $content = $_POST['content'];
        $task = Task::findById($id);
        if ($task) {
            $task->content = $content;
            $task->status = $status;
            $task->update();
            header("Location: /tasklist");
        }

    }
}