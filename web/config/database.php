<?php

$host = getenv('DB_HOST') ?: 'localhost';
$db_name = 'school_db';
$username = 'user';
$password = 'password';

try {
    $pdo = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
    die();
}