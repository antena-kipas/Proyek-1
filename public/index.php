<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Proyek1\Config\Database;
use Proyek1\App\Router;
use Proyek1\Controller\HomeController;
use Proyek1\Controller\UserController;
use Proyek1\Middleware\MustLoginMiddleware;
use Proyek1\Middleware\MustNotLoginMiddleware;

Database::getConnection('prod');



Router::add('GET', '/', HomeController::class, 'index');
Router::add('GET', '/program', HomeController::class, 'program', [MustNotLoginMiddleware::class]);
Router::add('GET', '/about', HomeController::class, 'about', [MustNotLoginMiddleware::class]);
Router::add('GET', '/kontak', HomeController::class, 'kontak', [MustNotLoginMiddleware::class]);



Router::add('GET', '/register',UserController::class, 'register', [MustNotLoginMiddleware::class]);
Router::add('POST', '/register', UserController::class, 'postRegister', [MustNotLoginMiddleware::class]);

Router::add('GET', '/Login',UserController::class, 'login', [MustNotLoginMiddleware::class]);
Router::add('POST', '/Login', UserController::class, 'postLogin', [MustNotLoginMiddleware::class]);

Router::add('GET', '/logout', UserController::class, 'logout', [MustLoginMiddleware::class]);

Router::add('GET', '/Profile',UserController::class, 'updateProfile', [MustLoginMiddleware::class]);
Router::add('POST', '/Profile',UserController::class, 'postUpdateProfile', [MustLoginMiddleware::class]);

Router::add('GET', '/Reset-password',UserController::class, 'forgotPassword', [MustNotLoginMiddleware::class]);
Router::add('POST', '/Reset-password',UserController::class, 'postForgotPassword', [MustNotLoginMiddleware::class]);

Router::add('GET', '/Laporan',UserController::class, 'laporan', [MustLoginMiddleware::class]);
Router::add('POST', '/Laporan',UserController::class, 'postLaporan', [MustLoginMiddleware::class]);
Router::add('GET', '/download-grouped-data', UserController::class, 'downloadGroupedData');


Router::add('GET', '/rekaplaporan',UserController::class, 'rekapLaporan', [MustLoginMiddleware::class]);

Router::add('GET', '/Akumulasi',UserController::class, 'akumulasi', [MustLoginMiddleware::class]);


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


Router::run();
