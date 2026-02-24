<?php

class StudentClass extends Model
{
    public function getAllStudentClasses()
    {
        $this->db->query("SELECT
            classes.id,
            classes.rombel AS rombel,
            grade_levels.grade AS grade,
            majors.name AS major_name,
            majors.description AS major_description
            FROM `classes`
            JOIN grade_levels ON classes.grade_level_id = grade_levels.id
            JOIN majors ON classes.major_id = majors.id;
        ");
        $this->db->execute();
        return $this->db->result();
    }

    public function getIdClass($class) {
        $temp = explode(' ', $class);

        $this->db->query("SELECT
            classes.id,
            classes.rombel AS rombel,
            grade_levels.grade AS grade,
            majors.name AS major_name,
            majors.description AS major_description
            FROM `classes`
            JOIN grade_levels ON classes.grade_level_id = grade_levels.id
            JOIN majors ON classes.major_id = majors.id
            WHERE grade_levels.grade=:grade AND majors.name=:major AND classes.rombel=:rombel;
        ");

        $this->db->bind(":grade", $temp[0]);
        $this->db->bind(":major", $temp[1]);
        $this->db->bind(":rombel", $temp[2]);

        $this->db->execute();
        return $this->db->result();
    }

    public function getClassById($id) {
        $this->db->query("SELECT
            classes.id AS class_id,
            classes.rombel AS rombel,
            grade_levels.grade AS grade,
            majors.name AS major_name
            FROM classes
            JOIN grade_levels ON classes.grade_level_id = grade_levels.id
            JOIN majors ON classes.major_id = majors.id
            WHERE classes.id=:id;
        ");

        $this->db->bind(":id", $id);

        $this->db->execute();
        return $this->db->single();
    }

    public function getStudentClassById($id) {
        $this->db->query("SELECT
            classes.id,
            classes.rombel AS rombel,
            grade_levels.grade AS grade,
            majors.name AS major_name,
            majors.description AS major_description
            FROM classes
            JOIN grade_levels ON classes.grade_level_id = grade_levels.id
            JOIN majors ON classes.major_id = majors.id
            WHERE classes.id = :id
        ");
        $this->db->bind(":id", $id);
        $this->db->execute();
        return $this->db->single();
    }
}
