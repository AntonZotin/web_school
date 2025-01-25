import random
from datetime import datetime, timedelta

def generate_schedule():
    # Данные для генерации
    max_class_id = 29
    max_teacher_id = 30
    max_subject_id = 44
    weekdays = ['Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница']
    lesson_duration = timedelta(minutes=45)  # Длительность урока
    break_duration = timedelta(minutes=15)  # Длительность перемены
    start_time_base = datetime.strptime("08:00:00", "%H:%M:%S")  # Начало первого урока

    schedule = []
    teacher_schedule = {teacher_id: {day: [] for day in weekdays} for teacher_id in range(1, max_teacher_id + 1)}

    for class_id in range(1, max_class_id + 1):
        for day in weekdays:
            start_time = start_time_base  # Начало дня
            lesson_count = random.randint(1, 6)  # Максимум 6 уроков в день

            for _ in range(lesson_count):
                while True:
                    teacher_id = random.randint(1, max_teacher_id)
                    subject_id = random.randint(1, max_subject_id)

                    # Проверяем, занят ли преподаватель в это время
                    end_time = start_time + lesson_duration
                    is_teacher_available = all(
                        not (start_time < lesson_end and end_time > lesson_start)
                        for lesson_start, lesson_end in teacher_schedule[teacher_id][day]
                    )

                    if is_teacher_available:
                        # Добавляем урок в расписание
                        schedule.append((
                            class_id,
                            teacher_id,
                            subject_id,
                            day,
                            start_time.strftime("%H:%M:%S"),
                            end_time.strftime("%H:%M:%S")
                        ))

                        # Сохраняем занятие преподавателя
                        teacher_schedule[teacher_id][day].append((start_time, end_time))
                        break  # Выходим из цикла, так как урок добавлен

                # Обновляем время начала следующего урока с учётом перемены
                start_time = end_time + break_duration

    return schedule

# Генерация расписания
schedule_data = generate_schedule()

# Вывод SQL скрипта
print('INSERT INTO schedule (class_id, teacher_id, subject_id, day_of_week, start_time, end_time)\nVALUES')
for idx, s in enumerate(schedule_data):
    if idx != len(schedule_data) - 1:
        print(f'\t{s},')
    else:
        print(f'\t{s};')
