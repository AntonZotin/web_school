<?php

namespace classes;

use PDO;

class Classroom {
    private ?PDO $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getClassrooms() {
        $sql = "SELECT * FROM classrooms";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getClassroomById($class_id) {
        $sql = "SELECT * FROM classrooms WHERE class_id = :class_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['class_id' => $class_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}