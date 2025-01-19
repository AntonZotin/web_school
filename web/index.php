<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/header.php');
?>

<div class="hero-section">
    <div class="hero-content">
        <h1>Добро пожаловать в приложение <span>Школа</span></h1>
        <p>Ваше решение для управления классами, преподавателями и расписанием.</p>
        <a href="/pages/schedule.php" class="cta-button">Просмотреть расписание</a>
    </div>
</div>

<section class="features-section">
    <h2>Что вы можете сделать</h2>
    <div class="features-grid">
        <div class="feature-item">
            <img src="/assets/icons/classroom.png" alt="Классы">
            <h3>Управление классами</h3>
            <p>Просматривайте и редактируйте информацию о классах вашей школы.</p>
            <a href="/pages/classrooms.php" class="link-button">Подробнее</a>
        </div>
        <div class="feature-item">
            <img src="/assets/icons/teacher.png" alt="Преподаватели">
            <h3>Преподаватели</h3>
            <p>Узнавайте больше о преподавателях, их предметах и расписании.</p>
            <a href="/pages/teachers.php" class="link-button">Подробнее</a>
        </div>
        <div class="feature-item">
            <img src="/assets/icons/schedule.png" alt="Расписание">
            <h3>Расписание</h3>
            <p>Планируйте занятия и находите расписание для вашего класса.</p>
            <a href="/pages/schedule.php" class="link-button">Подробнее</a>
        </div>
    </div>
</section>

<section class="testimonials-section">
    <h2>Отзывы пользователей</h2>
    <div class="testimonials">
        <blockquote>
            <p>"Простое и удобное приложение для управления школьной информацией. Очень помогает в организации!"</p>
            <cite>– Иван Петров, директор школы</cite>
        </blockquote>
        <blockquote>
            <p>"Теперь я легко нахожу расписание и могу быстро узнать, какой урок у моего ребенка."</p>
            <cite>– Анна Смирнова, родитель</cite>
        </blockquote>
    </div>
</section>

<section class="about-section">
    <h2>О проекте</h2>
    <p>
        Приложение <strong>"Школа"</strong> разработано для упрощения повседневных задач образовательных учреждений.
        Это мощный инструмент для управления информацией о классах, преподавателях и расписаниях.
        Мы стремимся сделать ваше взаимодействие с данными максимально удобным и эффективным.
    </p>
    <p>Начните прямо сейчас, выбрав нужный раздел!</p>
</section>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php');
?>
