SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS teachers (
    teacher_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

INSERT INTO teachers (first_name, last_name, email)
VALUES
    ('Иван', 'Иванов', 'ivan.ivanov@example.com'),
    ('Мария', 'Петрова', 'maria.petrova@example.com'),
    ('Алексей', 'Смирнов', 'aleksey.smirnov@example.com'),
    ('Елена', 'Попова', 'elena.popova@example.com'),
    ('Дмитрий', 'Кузнецов', 'dmitry.kuznetsov@example.com');

CREATE TABLE IF NOT EXISTS classrooms (
    class_id INT AUTO_INCREMENT PRIMARY KEY,
    class_name VARCHAR(50) NOT NULL,
    description TEXT
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

INSERT INTO classrooms (class_name, description)
VALUES
    ('1А', 'Класс для учащихся начальной школы.'),
    ('2Б', 'Класс для учащихся второй ступени.'),
    ('3В', 'Класс для учащихся средней школы.'),
    ('4Г', 'Класс для старшеклассников.'),
    ('5Д', 'Класс для учеников с углубленным изучением математики.');


CREATE TABLE IF NOT EXISTS subjects (
    subject_id INT AUTO_INCREMENT PRIMARY KEY,
    subject_name VARCHAR(100) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

INSERT INTO subjects (subject_name)
VALUES
    ('Математика'),
    ('Русский язык'),
    ('Физика'),
    ('Химия'),
    ('История'),
    ('Биология'),
    ('География'),
    ('Иностранный язык'),
    ('Информатика'),
    ('Литература');

CREATE TABLE IF NOT EXISTS schedule (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    class_id INT NOT NULL,
    teacher_id INT NOT NULL,
    subject_id INT NOT NULL,
    day_of_week VARCHAR(40) NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    FOREIGN KEY (class_id) REFERENCES classrooms(class_id),
    FOREIGN KEY (teacher_id) REFERENCES teachers(teacher_id),
    FOREIGN KEY (subject_id) REFERENCES subjects(subject_id)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

INSERT INTO schedule (class_id, teacher_id, subject_id, day_of_week, start_time, end_time)
VALUES
    (1, 1, 1, 'Понедельник', '08:30:00', '09:15:00'),
    (1, 2, 2, 'Понедельник', '09:30:00', '10:15:00'),
    (2, 3, 3, 'Вторник', '08:30:00', '09:15:00'),
    (2, 4, 4, 'Вторник', '09:30:00', '10:15:00'),
    (3, 5, 5, 'Среда', '08:30:00', '09:15:00'),
    (3, 1, 6, 'Среда', '09:30:00', '10:15:00'),
    (4, 2, 7, 'Четверг', '08:30:00', '09:15:00'),
    (4, 3, 8, 'Четверг', '09:30:00', '10:15:00'),
    (5, 4, 9, 'Пятница', '08:30:00', '09:15:00'),
    (5, 5, 10, 'Пятница', '09:30:00', '10:15:00');

