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
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getScheduleByClass($class_id) {
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
            WHERE 
                s.class_id = :class_id
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['class_id' => $class_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getScheduleByTeacher($teacher_id) {
        $sql = "SELECT * FROM schedule WHERE teacher_id = :teacher_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['teacher_id' => $teacher_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}