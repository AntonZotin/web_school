<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Schedule.php');
use classes\Schedule;

include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/config/database.php');

$schedule = new Schedule($pdo);

$class_id = 1;
$schedule_items = $schedule->getScheduleByClass($class_id);
?>

<h1>Расписание для класса <?php echo $class_id; ?></h1>
<table>
    <thead>
    <tr>
        <th>День недели</th>
        <th>Время начала</th>
        <th>Время конца</th>
        <th>Предмет</th>
        <th>Преподаватель</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($schedule_items as $item): ?>
        <tr>
            <td><?php echo htmlspecialchars($item['day_of_week']); ?></td>
            <td><?php echo htmlspecialchars($item['start_time']); ?></td>
            <td><?php echo htmlspecialchars($item['end_time']); ?></td>
            <td><?php echo htmlspecialchars($item['subject_name']); ?></td>
            <td><?php echo htmlspecialchars($item['first_name']); ?> <?php echo htmlspecialchars($item['last_name']); ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>
