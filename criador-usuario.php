<?php

declare(strict_types=1);

$dbPath = __DIR__ . '/banco.sqlite';
$pdo = new PDO("sqlite:$dbPath");

$email = $argv[1];
$senha = $argv[2];

echo $email . PHP_EOL;
echo $senha . PHP_EOL;

$hash = password_hash($senha, PASSWORD_ARGON2ID);


$sql = "INSERT INTO user (email, password) VALUES (?, ?);";

$statement = $pdo->prepare($sql);
$statement->bindValue(1, $email);
$statement->bindValue(2, $hash);
$statement->execute();



