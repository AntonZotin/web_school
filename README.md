school_project/
│
├── index.php               # Главная страница, входная точка
├── config/                 # Конфигурационные файлы
│   └── database.php        # Подключение к базе данных
├── includes/               # Общие файлы (например, для хедеров, футеров, и т.д.)
│   └── header.php          # Хедер сайта
│   └── footer.php          # Футер сайта
├── assets/                 # Статические файлы (CSS, JS, изображения)
│   └── style.css           # Стиль для сайта
├── classes/                # Классы для работы с данными
│   └── Database.php        # Класс для работы с базой данных
│   └── Schedule.php        # Класс для работы с расписанием
│   └── Teacher.php         # Класс для работы с преподавателями
│   └── Subject.php         # Класс для работы с дисциплинами
│   └── Class.php           # Класс для работы с классами
├── pages/                  # Страницы приложения
│   └── schedule.php        # Страница расписания
│   └── teachers.php        # Страница с информацией о преподавателях
│   └── classes.php         # Страница с информацией о классах
└── .env                    # Файл для конфигурации переменных среды (например, параметры базы данных)


БД

Teachers (Учителя)

teacher_id (INT, PRIMARY KEY, AUTO_INCREMENT) — уникальный идентификатор преподавателя
first_name (VARCHAR(100)) — имя
last_name (VARCHAR(100)) — фамилия
email (VARCHAR(100)) — электронная почта
Subjects (Дисциплины)

subject_id (INT, PRIMARY KEY, AUTO_INCREMENT) — уникальный идентификатор дисциплины
subject_name (VARCHAR(100)) — название дисциплины
Classes (Классы)

class_id (INT, PRIMARY KEY, AUTO_INCREMENT) — уникальный идентификатор класса
class_name (VARCHAR(50)) — название класса (например, 10A, 11B)
teacher_id (INT, FOREIGN KEY) — внешний ключ на teacher_id из таблицы Teachers
Schedule (Расписание)

schedule_id (INT, PRIMARY KEY, AUTO_INCREMENT) — уникальный идентификатор записи расписания
class_id (INT, FOREIGN KEY) — внешний ключ на class_id из таблицы Classes
subject_id (INT, FOREIGN KEY) — внешний ключ на subject_id из таблицы Subjects
day_of_week (VARCHAR(10)) — день недели (например, "Понедельник")
start_time (TIME) — время начала занятия
end_time (TIME) — время окончания занятия