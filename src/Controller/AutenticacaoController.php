<?php

namespace Alura\Mvc\Controller;

class AutenticacaoController implements Controller
{

    private \PDO $pdo;

    public function __construct()
    {
        $dbPath = __DIR__ . '/../../banco';
        $this->pdo = new \PDO("sqlite:$dbPath");
    }

    public function processaRequisicao(): void
    {
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $sql = 'SELECT * FROM user WHERE email = ?';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $email);

        $statement->execute();

        $userData = $statement->fetch(\PDO::FETCH_ASSOC);

        $isValidPass = password_verify($password, $userData['password'] ?? '');

        if ($isValidPass) {
            $_SESSION['logado'] = true;

            header('Location: /');
        } else {
            header('Location: /login?sucesso=0');
        }
    }
}