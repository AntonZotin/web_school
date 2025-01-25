<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Schedule.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Classroom.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/classes/Teacher.php');

use classes\Schedule;
use classes\Classroom;
use classes\Teacher;

include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/config/database.php');

// Инициализация классов
$schedule = new Schedule($pdo);
$classroom = new Classroom($pdo);
$teacher = new Teacher($pdo);

// Получение всех классов и преподавателей для фильтрации
$classrooms = $classroom->getClassrooms();
$teachers = $teacher->getTeachers();

$filters = [
    'class_id' => $_GET['class_id'] ?? null,
    'teacher_id' => $_GET['teacher_id'] ?? null,
    'sort_by' => $_GET['sort_by'] ?? 'day_of_week',
];

$schedule_items = $schedule->getScheduleByFilter($filters);
?>

<h1>Расписание</h1>

<div class="filters">
    <form method="GET" action="">
        <label for="class_id">Класс:</label>
        <select name="class_id" id="class_id">
            <option value="">Все классы</option>
            <?php foreach ($classrooms as $class): ?>
                <option value="<?php echo $class['class_id']; ?>"
                    <?php echo isset($filters['class_id']) && $filters['class_id'] == $class['class_id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($class['class_name']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="teacher_id">Преподаватель:</label>
        <select name="teacher_id" id="teacher_id">
            <option value="">Все преподаватели</option>
            <?php foreach ($teachers as $teacherItem): ?>
                <option value="<?php echo $teacherItem['teacher_id']; ?>"
                    <?php echo isset($filters['teacher_id']) && $filters['teacher_id'] == $teacherItem['teacher_id'] ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($teacherItem['first_name'] . " " . $teacherItem['last_name']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="sort_by">Сортировать по:</label>
        <select name="sort_by" id="sort_by">
            <option value="day_of_week" <?php echo $filters['sort_by'] == 'day_of_week' ? 'selected' : ''; ?>>День недели</option>
            <option value="start_time" <?php echo $filters['sort_by'] == 'start_time' ? 'selected' : ''; ?>>Время начала</option>
            <option value="class_name" <?php echo $filters['sort_by'] == 'class_name' ? 'selected' : ''; ?>>Класс</option>
        </select>

        <button type="submit">Применить</button>
    </form>
</div>

<table>
    <thead>
    <tr>
        <th>День недели</th>
        <th>Время</th>
        <th>Класс</th>
        <th>Предмет</th>
        <th>Преподаватель</th>
    </tr>
    </thead>
    <tbody>
    <?php if (empty($schedule_items)): ?>
        <tr>
            <td colspan="5">Нет данных для отображения</td>
        </tr>
    <?php else: ?>
        <?php foreach ($schedule_items as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['day_of_week']); ?></td>
                <td><?php echo htmlspecialchars($item['start_time'] . " - " . $item['end_time']); ?></td>
                <td><?php echo htmlspecialchars($item['class_name']); ?></td>
                <td><?php echo htmlspecialchars($item['subject_name']); ?></td>
                <td><?php echo htmlspecialchars($item['first_name'] . " " . $item['last_name']); ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>
