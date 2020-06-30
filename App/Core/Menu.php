<?php

namespace App\Core;

class Menu extends TSingletone {

    public $MenuItem = array("Главная" => "/", "Добавить" => "/add", "Редактировать" => "/tasklist", "Вход" => "/enter");

    //private function __construct() {}

    public function  getMenu() {
		$print = '<ul class="nav navbar-nav text-uppercase mr-auto">';
		foreach ($this->MenuItem as $name=>$item) {
			if (!isset($_SESSION['User'])) $_SESSION['User'] = "";
			if ($name == "Вход" && $_SESSION["User"] == "admin") {
				$print.='<li><a href="/enter">'.$_SESSION["User"].'</a> [ <a href="/enter?out=1"><span style="font-size:10px">Выход</span></a> ]</li>';
			}
			elseif ($name == "Редактировать" && $_SESSION["User"] != "admin") {
				continue;
			}
		    else $print.='<li><a href="'.$item.'">'.$name.'</a></li>';
		}
		$print .= "</ul>";
		return  $print;		 
	}
}