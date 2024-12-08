<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Proyek1\Config\Database;
use Proyek1\App\Router;
use Proyek1\Controller\HomeController;
use Proyek1\Controller\UserController;

Database::getConnection('prod');



Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/program', HomeController::class, 'program');
Router::add('GET', '/about', HomeController::class, 'about');
Router::add('GET', '/kontak', HomeController::class, 'kontak');

Router::add('GET', '/register',UserController::class, 'register', []);
Router::add('POST', '/register', UserController::class, 'postRegister', []);

Router::add('GET', '/Login',UserController::class, 'login', []);
Router::add('POST', '/Login', UserController::class, 'postLogin', []);



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


Router::run();