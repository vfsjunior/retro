<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Application\Service\SessionService;

class LoginFormController implements Controller
{

    public function processaRequisicao(): void
    {
        if (SessionService::logado()) {
            header('Location: /');
        }

        require_once __DIR__ . '/../../views/login-form.php';
    }
}