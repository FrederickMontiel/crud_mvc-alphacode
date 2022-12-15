<?php

require_once 'vendor/autoload.php';

use EasyProjects\SimpleRouter\Router as Router;
use App\Controller\HomeController;

$router = new Router();

$router->get('/',[HomeController::class,'index']);
$router->get('/contact/create',[HomeController::class,'create']);
$router->post('/contact',[HomeController::class,'store']);
$router->delete('/contact/{id}',[HomeController::class,'destroy']);
$router->get('/contact/{id}/edit',[HomeController::class,'edit']);
$router->put('/contact/{id}',[HomeController::class,'update']);

$router->start();

