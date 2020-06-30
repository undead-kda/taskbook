<?php

namespace App\Core;

class Application {

    private $admRoutes = array(
        'edit',
        'tasklist'
    );
    
    private function getRoute() {
        if (empty($_GET['route'])) {
            $route = 'index';
        }
        else {
            $route = $_GET['route'];
        }

        if (!isset($_SESSION['User']) || $_SESSION['User'] != 'admin') {
            if (in_array($route, $this->admRoutes)) {
                $route = 'error404';
            }
        }

        return $route;
    }

    private function getController() {
        $route = ucfirst($this->getRoute());
        $controllerPath = 'App/Controllers/';
        $controller = $controllerPath . $route . '.php';
        return $controller;
    }

    public function getView() {
        $route = $this->getRoute();
        $viewPath = 'App/Views/';
        $view = $viewPath . $route . '.php';
        return $view;
    }

    public function Run() {
		session_start();
		$controller = $this->getController();
		$cl = explode('.', $controller);
        $cl = $cl[0];
        $name_contr = str_replace('/', '\\', $cl);
		$contr = new $name_contr;
		$contr->index();
		$member = $contr->member;
		return $member;
	}
}