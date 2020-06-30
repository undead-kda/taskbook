<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Task;

class Index extends Controller {

    public function index() {
        $pageCount = intval(Task::recCount()[0]);
        $interval = 3;
        
        if (floor($pageCount / $interval) * $interval < $pageCount) $this->intervalCount = floor($pageCount / $interval) + 1; 
            else $this->intervalCount = floor($pageCount / $interval);

        if (!isset($_GET['page'])) $page = 1; else $page = intval($_GET['page']);
        if (!isset($_GET['sort'])) $sort = 0; else $sort = intval($_GET['sort']);

        if ($sort == 0) {
            $checkStatus0 = 'checked';
            $checkStatus1 = '';
        }
        else {
            $checkStatus0 = '';
            $checkStatus1 = 'checked';
        }

        $this->records = Task::findAllByPages($interval, $page, $sort);
        $this->interval = $interval;
        $this->page = $page;
        $this->sort = $sort;
        $this->checkStatus0 = $checkStatus0;
        $this->checkStatus1 = $checkStatus1;

    }

}