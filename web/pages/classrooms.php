<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Classroom.php');
use classes\Classroom;

include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/config/database.php');
$classroom = new Classroom($pdo);
$classrooms = $classroom->getClassrooms();
?>

<h1>Классы</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Название класса</th>
        <th>Описание</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($classrooms as $class): ?>
        <tr>
            <td><?php echo htmlspecialchars($class['class_id']); ?></td>
            <td><?php echo htmlspecialchars($class['class_name']); ?></td>
            <td><?php echo htmlspecialchars($class['description']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>
