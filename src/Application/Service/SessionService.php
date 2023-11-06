<?php

namespace Alura\Mvc\Application\Service;

class SessionService
{

    public static function logado(): bool
    {
        session_start();

        if (array_key_exists('logado', $_SESSION) && $_SESSION['logado'] === true) {
            return true;
        }

        return false;
    }

    public static function isTelaLogin(string $pathInfo): bool
    {
        // para evitar um loop e many redirects
        $isLoginRoute = $pathInfo === '/login';

        if ($isLoginRoute) {
            return true;
        }

        return false;
    }

    public static function logout(): void
    {
        session_destroy();
    }

}