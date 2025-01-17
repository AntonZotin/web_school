<?php

namespace classes;

use PDO;

class Teacher {
    private ?PDO $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getTeachers() {
        $sql = "SELECT * FROM teachers";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTeacherById($teacher_id) {
        $sql = "SELECT * FROM teachers WHERE teacher_id = :teacher_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['teacher_id' => $teacher_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}