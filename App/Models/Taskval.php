<?php

namespace App\Models;

class Taskval {

    public function validTask($data) {
        $errMsg = '';

        if ($data['name'] == '') $errMsg .= "<br><em><span style='color:red'>Не введено имя</span></em>";

        if ($data['email'] == '') {
            $errMsg .= "<br><em><span style='color:red'>Не введён адрес email</span></em>";
        }
        else {
            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) 
                $errMsg .= "<br><em><span style='color:red'>Не корректный email</span></em>";
        }

        if ($data['content'] == '') $errMsg .= "<br><em><span style='color:red'>Не введён текст задачи</span></em>";

        return $errMsg;
    }
}