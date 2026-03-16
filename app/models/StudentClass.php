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

    public function getAllStudentClassesWithTeachers()
    {
        $this->db->query("SELECT
            classes.id,
            classes.rombel AS rombel,
            grade_levels.grade AS grade,
            majors.name AS major_name,
            majors.description AS major_description,
            form_tutor.code AS form_tutor_code,
            form_tutor.fullname AS form_tutor_name,
            bk_teacher.code AS bk_teacher_code,
            bk_teacher.fullname AS bk_teacher_name
            FROM `classes`
            LEFT JOIN grade_levels ON classes.grade_level_id = grade_levels.id
            LEFT JOIN majors ON classes.major_id = majors.id
            LEFT JOIN users AS form_tutor ON classes.form_tutor_code = form_tutor.code
            LEFT JOIN users AS bk_teacher ON classes.bk_teacher_code = bk_teacher.code
        ");
        $this->db->execute();
        return $this->db->result();
    }

    public function getIdClass($class)
    {
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

    public function getStudentClassById($id)
    {
        $this->db->query("SELECT
            classes.id,
            classes.rombel AS rombel,
            grade_levels.grade AS grade,
            majors.name AS major_name,
            majors.description AS major_description,
            form_tutor.code AS form_tutor_code,
            form_tutor.fullname AS form_tutor_name,
            bk_teacher.code AS bk_teacher_code,
            bk_teacher.fullname AS bk_teacher_name
            FROM `classes`
            LEFT JOIN grade_levels ON classes.grade_level_id = grade_levels.id
            LEFT JOIN majors ON classes.major_id = majors.id
            LEFT JOIN users AS form_tutor ON classes.form_tutor_code = form_tutor.code
            LEFT JOIN users AS bk_teacher ON classes.bk_teacher_code = bk_teacher.code
            WHERE classes.id = :id
        ");
        $this->db->bind(":id", $id);
        $this->db->execute();
        return $this->db->single();
    }
    
    public function getStudentClassByGradeAndMajor(string $grade, string $major)
    {
        $this->db->query("SELECT
            classes.id,
            classes.rombel AS rombel,
            grade_levels.grade AS grade,
            majors.name AS major_name,
            majors.description AS major_description
            FROM classes
            JOIN grade_levels ON classes.grade_level_id = grade_levels.id
            JOIN majors ON classes.major_id = majors.id
            WHERE grade_levels.grade = :grade AND majors.name = :major
        ");
        $this->db->bind(":grade", $grade);
        $this->db->bind(":major", $major);
        $this->db->execute();
        return $this->db->single();
    }

    public function create(
        $major_id,
        $grade_level_id,
        $form_tutor_code,
        $bk_teacher_code,
        $rombel
    ) {
        $this->db->query("INSERT INTO classes (major_id, grade_level_id, form_tutor_code, bk_teacher_code, rombel)
            VALUES (:major_id, :grade_level_id, :form_tutor_code, :bk_teacher_code, :rombel)
        ");

        $this->db->bind(":major_id", $major_id);
        $this->db->bind(":grade_level_id", $grade_level_id);
        $this->db->bind(":form_tutor_code", $form_tutor_code);
        $this->db->bind(":bk_teacher_code", $bk_teacher_code);
        $this->db->bind(":rombel", $rombel);

        $this->db->execute();
    }

    public function update(
        $id,
        $major_id,
        $grade_level_id,
        $form_tutor_code,
        $bk_teacher_code,
        $rombel
    ) {
        $this->db->query("UPDATE classes SET
            major_id=:major_id,
            grade_level_id=:grade_level_id,
            form_tutor_code=:form_tutor_code,
            bk_teacher_code=:bk_teacher_code,
            rombel=:rombel
            WHERE id = :id
        ");

        $this->db->bind(":id", $id);
        $this->db->bind(":major_id", $major_id);
        $this->db->bind(":grade_level_id", $grade_level_id);
        $this->db->bind(":form_tutor_code", $form_tutor_code);
        $this->db->bind(":bk_teacher_code", $bk_teacher_code);
        $this->db->bind(":rombel", $rombel);

        $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM classes WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
}
