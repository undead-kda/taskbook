<?php

error_reporting(E_ALL);

require __DIR__ . '/autoload.php';

$router = new App\Core\Application;
$member = $router->Run();
$member['init'] = 0;
foreach ($member as $key => $value) {
    $$key = $value;
}

// Including template
// Header
require __DIR__ . '/Templates/header.php';
// Content
$view = $router->getView();
include __DIR__ . DIRECTORY_SEPARATOR . $view;
// Footer
require __DIR__ . '/Templates/footer.php';