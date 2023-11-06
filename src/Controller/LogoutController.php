<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Application\Service\SessionService;
use Alura\Mvc\Controller\Controller;

class LogoutController implements Controller
{

    public function processaRequisicao(): void
    {
        SessionService::logout();

        header('Location: /login');
    }
}