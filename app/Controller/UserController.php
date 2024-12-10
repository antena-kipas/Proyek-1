<?php

namespace Proyek1\Controller;

use Proyek1\Config\Database;
use Proyek1\Exception\ValidationException;
use Proyek1\Model\UserLoginRequest;
use Proyek1\Model\UserRegisterRequest;
use Proyek1\Service\UserService;
use Proyek1\Repository\UserRepository;
use Proyek1\App\View;

require_once __DIR__ . '/../Repositrory/UserRepository.php';

class UserController
{
    private UserService $userService;
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection('');
        $userRepository = new UserRepository($connection);
        $this->userService = new UserService($userRepository);
    }

    public function register()
    {
        View::render('Register/index', [
            'title' => 'Register new User'
        ]);
    }

    public function postRegister()
    {
        $request = new UserRegisterRequest();
        $request->id = $_POST['id'];
        $request->name = $_POST['name'];
        $request->password = $_POST['password'];

        try {
            $this->userService->register($request);
            View::redirect('Login/index');
        } catch (ValidationException $exception) {
            View::render('Register/index', [
                'title' => 'Register new User',
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function login(){
        View::render('Login/index', [
            "title" => "Login"
        ]);
    }

    public function postLogin(){
        $request = new UserLoginRequest();
        $request->id = $_POST['id'];
        $request->password = $_POST['password'];
        try {
            $this->userService->login($request);
        } catch (ValidationException $exception){
            View::render('Login/index', [
                'title' => "Login",
                'error' => $exception->getMessage()
            ]);
        }
    }
}