<?php
require_once __DIR__ . '/../vendor/autoload.php';


use app\core\application;
use app\controllers\siteController;

$app= new application(dirname(__DIR__));

$app->router->get('/', 'home');
$app->router->get('/contact', 'contact');
$app->router->post('/contact',[siteController::class, 'handlecontact']);


$app->run();