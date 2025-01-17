<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/config/database.php');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Школа - Веб-приложение</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="/index.php">Главная</a></li>
            <li><a href="/pages/classrooms.php">Классы</a></li>
            <li><a href="/pages/teachers.php">Преподаватели</a></li>
            <li><a href="/pages/schedule.php">Расписание</a></li>
        </ul>
    </nav>
</header>
<main>