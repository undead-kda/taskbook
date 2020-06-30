<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;

class Tasklist extends Controller {

    public function index() {
        $task = new Task();
        $this->records = $task::findAll();
    }
}