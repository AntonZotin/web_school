<?php

namespace classes;

use PDO;

class Subject {
    private ?PDO $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getSubjects() {
        $sql = "SELECT * FROM subjects";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSubjectById($subject_id) {
        $sql = "SELECT * FROM subjects WHERE subject_id = :subject_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['subject_id' => $subject_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}