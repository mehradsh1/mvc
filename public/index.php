<?php
require_once __DIR__ . '/../vendor/autoload.php';

use app\core\application;

$app= new application();

$app->router->get('/', 'home');
$app->router->get('/contact', 'contact');



$app->run();