<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Teacher.php');
use classes\Teacher;

include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/config/database.php');

$teacher = new Teacher($pdo);
$teachers = $teacher->getTeachers();
?>

<h1>Преподаватели</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Имя</th>
        <th>Предмет</th>
        <th>Почта</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($teachers as $t): ?>
        <tr>
            <td><?php echo htmlspecialchars($t['teacher_id']); ?></td>
            <td><?php echo htmlspecialchars($t['first_name']); ?></td>
            <td><?php echo htmlspecialchars($t['last_name']); ?></td>
            <td><?php echo htmlspecialchars($t['email']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>
