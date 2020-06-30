<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Auth;

class Enter extends Controller {

    public function index() {
        if (!isset($_SESSION['Auth'])) $_SESSION['Auth'] = false;
        if (!$this->msg) $this->msg = "";
        
        if ($_SESSION['Auth'] == false) {
            $this->unVisibleForm = false;
        }
        else {
            $this->userName = $_SESSION["User"];
        }

        if (isset($_REQUEST['login']) && $_REQUEST['login'] && $_REQUEST['password']) {
            $authModel = new Auth;
            $resultValid = $authModel->validData($_REQUEST['login'], md5($_REQUEST['password']));
            if ($resultValid) {
                $_SESSION['Auth'] = true;
                $_SESSION['User'] = $resultValid->login;
                $this->msg = "";
                $this->unVisibleForm = true;
                $this->userName = $resultValid->login;
            }
            else {
                $_SESSION['Auth'] = false;
                $_SESSION['User'] = "";
                $this->msg = "<em><span style='color:red'>Данные введены не верно!</span></em>";
                $this->unVisibleForm = false;
            }
        }
        else {
            if ($_SESSION["Auth"]) $this->unVisibleForm = true;
        }

        if ((isset($_REQUEST['out'])) && ($_REQUEST['out'] == "1")) {
			$_SESSION["Auth"] = false;
			$_SESSION["User"] = "";
			$this->unVisibleForm = false;
		}
    }

}