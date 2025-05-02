<?php

namespace Proyek1\Middleware;

use Proyek1\Config\Database;
use Proyek1\Repository\SessionRepository;
use Proyek1\App\View;
use Proyek1\Repository\UserRepository;
use Proyek1\Service\SessionService;





class MustNotLoginMiddleware implements Middleware
{
    private SessionService $sessionService;

    public function __construct()
    {
        $sessionRepository = new SessionRepository(Database::getConnection('prod'));
        $userRepository = new UserRepository(Database::getConnection('prod'));
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }

    function before(): void
    {
        $user = $this->sessionService->current();
        if ($user != null) {
            View::redirect('/');
        }
    }
}