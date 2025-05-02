<?php

namespace Proyek1\Controller;
use Proyek1\App\View;
use Proyek1\Config\Database;
use Proyek1\Repository\UserRepository;
use Proyek1\Service\SessionService;
use Proyek1\Repository\SessionRepository;


require_once __DIR__ . '/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class HomeController
{
    private SessionService $sessionService;

    public function __construct()
    {
        $connection = Database::getConnection('prod');
        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    function index()
    {
        $user = $this->sessionService->current();

        
        if ($user == null) {
            View::render('Home/index', [
            ]);
        } else {
            View::render('Dashboard/Dashboard', [
                "title" => "ini Dashboard",
                "user" => [
                    "name" => $user->name
                ]
            ]);
        }
    }

    function kontak(): void
    {
        $model = [];
        View::render('Kontak/index', $model);
    }

    function postKontak(): void 
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $subject = $_POST["subject"];
        $message = $_POST["message"];

        try {
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->SMTPAuth = true;

            $mail->Host = "smtp.example.com";
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = "tutu";
            $mail->Password = "password";

            $mail->setFrom($email, $name);
            $mail->addAddress("tingtest77777@gmail.com", "tingtest");

            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            View::redirect('/Kontak');

        } catch (\Exception $exception) {
            // Log error untuk debugging
            echo "hello";
        }
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