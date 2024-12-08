<?php

namespace Proyek1\Controller;
use Proyek1\App\View;

class HomeController
{

    function index(): void
    {
        $model = [
        ];

        View::render('Home/index', $model);
    }

    function kontak(): void
    {
        $model = [];
        View::render('Kontak/index', $model);
    }

    function program(): void
    {
        $model = [];
        View::render('Program/index', $model);
    }

    function about(): void
    {
        $model = [];
        View::render('About/index', $model);
    }

    function login(): void
    {
        $request = [
            "username" => $_POST['username'],
            "password" => $_POST['password']
        ];

        $user = [

        ];

        $response = [
            "message" => "Login Sukses"
        ];
        // kirimkan response ke view
    }

}