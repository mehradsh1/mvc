<?php
require_once __DIR__ . '/../vendor/autoload.php';


use app\core\application;
use app\controllers\siteController;
use app\controllers\authcontroller;

$app= new application(dirname(__DIR__));

$app->router->get('/', [siteController::class , 'home']);
$app->router->get('/contact', [siteController::class ,'contact']);
$app->router->post('/contact',[siteController::class , 'handlecontact']);
$app->router->get('/login',[ authcontroller::class , 'login']);
$app->router->post('/login',[ authcontroller::class , 'login']);
$app->router->get('/register',[ authcontroller::class , 'register']);
$app->router->post('/register',[ authcontroller::class , 'register']);


$app->run();