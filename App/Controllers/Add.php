<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Taskval;
use App\Models\Task;

class Add extends Controller {
    
    public function index() {
        if (isset($_POST['name']) && isset($_POST['name']) && isset($_POST['name'])) {
            $data = array('name' => htmlspecialchars($_POST['name']), 'email' => htmlspecialchars($_POST['email']), 'content' => htmlspecialchars($_POST['content']), 'status' => 0);
            
            $taskVal = new Taskval();

            $validationResult = $taskVal->validTask($data);

            if ($validationResult == '') {
                $this->unVisibleTaskForm = true;
                $task = new Task(0, $data['name'], $data['email'], $data['content'], $data['status']);
                $res = $task->add();
            }
            else {
                $this->taskMsg = $validationResult;
                $this->unVisibleTaskForm = false;
                $this->name = $data['name'];
                $this->email = $data['email'];
                $this->content = $data['content'];
            }
        }

        
        
    }
}