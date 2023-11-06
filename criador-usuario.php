<?php

declare(strict_types=1);

$dbPath = __DIR__ . '/banco';
$pdo = new PDO("sqlite:$dbPath");

$email = $argv[1];
$senha = $argv[2];

try {
    $hash = password_hash($senha, PASSWORD_ARGON2ID);

    $sql = "INSERT INTO user (email, password) VALUES (?, ?);";

    $statement = $pdo->prepare($sql);

    $statement->bindValue(1, $email);
    $statement->bindValue(2, $hash);

    if ($statement->execute()) {
        echo "User add with success: " . $email . PHP_EOL;
    }
} catch (\Throwable $t) {
    echo $t->getMessage();
}



