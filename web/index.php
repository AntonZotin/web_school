<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
?>

<h1>Добро пожаловать в приложение Школа</h1>
<p>Это веб-приложение для управления информацией о классе, преподавателях и расписании.</p>

<nav>
    <ul>
        <li><a href="/pages/classrooms.php">Классы</a></li>
        <li><a href="/pages/teachers.php">Преподаватели</a></li>
        <li><a href="/pages/schedule.php">Расписание</a></li>
    </ul>
</nav>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>
