<?php

namespace classes;

use PDO;

class Schedule {
    private ?PDO $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getScheduleByFilter($filters) {
        $conditions = [];
        $params = [];

        if (!empty($filters['class_id'])) {
            $conditions[] = "s.class_id = :class_id";
            $params['class_id'] = $filters['class_id'];
        }

        if (!empty($filters['teacher_id'])) {
            $conditions[] = "s.teacher_id = :teacher_id";
            $params['teacher_id'] = $filters['teacher_id'];
        }

        $whereClause = count($conditions) > 0 ? "WHERE " . implode(" AND ", $conditions) : "";

        $allowedSortFields = ['day_of_week', 'start_time', 'class_name'];
        $sortBy = in_array($filters['sort_by'] ?? '', $allowedSortFields) ? $filters['sort_by'] : 'day_of_week';

        if ($sortBy === 'day_of_week') {
            $orderClause = "
            ORDER BY 
                CASE s.day_of_week
                    WHEN 'Понедельник' THEN 1
                    WHEN 'Вторник' THEN 2
                    WHEN 'Среда' THEN 3
                    WHEN 'Четверг' THEN 4
                    WHEN 'Пятница' THEN 5
                END,
                s.start_time";
        } else {
            $orderClause = "ORDER BY $sortBy";
        }

        $sql = "
            SELECT 
                s.schedule_id,
                s.day_of_week AS day_of_week,
                DATE_FORMAT(s.start_time, '%H:%i') AS start_time,
                DATE_FORMAT(s.end_time, '%H:%i') AS end_time,
                c.class_name AS class_name,
                t.first_name AS first_name,
                t.last_name AS last_name,
                sub.subject_name AS subject_name
            FROM 
                schedule s
            INNER JOIN 
                classrooms c ON s.class_id = c.class_id
            INNER JOIN 
                teachers t ON s.teacher_id = t.teacher_id
            INNER JOIN 
                subjects sub ON s.subject_id = sub.subject_id
            $whereClause
            $orderClause
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}