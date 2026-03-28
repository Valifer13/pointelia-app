<?php

class StudentViolation extends Model
{
    public function getAllViolations()
    {
        $this->db->query("SELECT * FROM student_violations");
        $this->db->execute();
        return $this->db->result();
    }

    public function getAllViolationsByStudentNis($studentNis)
    {
        $this->db->query("SELECT * FROM student_violations WHERE student_nis = :student_nis");
        $this->db->bind(":student_nis", $studentNis);
        $this->db->execute();
        return $this->db->result();
    }

    public function getAllViolationsWithTypeByStudentNis($studentNis)
    {
        $this->db->query("SELECT
            student_violations.violation_date as violation_date,
            student_violations.notes as notes,
            student_violations.status as status,
            reporter.fullname as reporter_name,
            validator.fullname as validator_name,
            violation_types.name as violation_name,
            violation_types.point_value as violation_poin
            FROM student_violations
            JOIN violation_types ON student_violations.violation_type_id = violation_types.id
            JOIN users as reporter ON student_violations.reported_by = reporter.code
            LEFT JOIN users as validator ON student_violations.validated_by = validator.code
            WHERE student_violations.student_nis = :student_nis;
        ");

        $this->db->bind(":student_nis", $studentNis);
        $this->db->execute();
        return $this->db->result();
    }

    public function getAllViolationsWithStudentsTeacher()
    {
        $this->db->query("SELECT
                students.nis as student_nis,
                students.name as student_name,
                violation_types.name as violation_type_name,
                violation_types.point_value as violation_poin,
                reporter.code as reporter_code,
                reporter.fullname as reporter_name,
                validator.code as validator_code,
                validator.fullname as validator_name,
                student_violations.id as violation_id,
                student_violations.violation_date as violation_date,
                student_violations.notes as violation_notes,
                student_violations.status as violation_status,
                student_violations.validated_at as validated_at
            FROM student_violations
                JOIN students ON student_violations.student_nis = students.nis
                JOIN violation_types ON student_violations.violation_type_id = violation_types.id
                JOIN users as reporter ON  student_violations.reported_by = reporter.code
                LEFT JOIN users as validator ON  student_violations.validated_by = validator.code;
        ");
        $this->db->execute();
        return $this->db->result();
    }

    public function getAllViolationsWithStudentsTeachersAndPagination(int $page = 1, int $perPage = 10)
    {
        // Pastikan page minimal 1
        (int) $page = max($page, 1);

        (int) $offset = ($page - 1) * $perPage;

        $this->db->query("SELECT
                students.nis as student_nis,
                students.name as student_name,
                violation_types.name as violation_type_name,
                violation_types.point_value as violation_poin,
                reporter.code as reporter_code,
                reporter.fullname as reporter_name,
                validator.code as validator_code,
                validator.fullname as validator_name,
                student_violations.id as violation_id,
                student_violations.violation_date as violation_date,
                student_violations.notes as violation_notes,
                student_violations.status as violation_status,
                student_violations.validated_at as validated_at
            FROM student_violations
                JOIN students ON student_violations.student_nis = students.nis
                JOIN violation_types ON student_violations.violation_type_id = violation_types.id
                JOIN users as reporter ON  student_violations.reported_by = reporter.code
                LEFT JOIN users as validator ON  student_violations.validated_by = validator.code
            ORDER BY student_violations.created_at DESC
            LIMIT $perPage OFFSET $offset;
        ");
        $this->db->execute();
        $data = $this->db->result();

        // Hitung total data
        $this->db->query("SELECT COUNT(*) as total FROM student_violations");
        $this->db->execute();
        $total = $this->db->single()['total'];

        // Hitung last page
        $lastPage = ceil($total / $perPage);

        return [
            'data' => $data,
            'pagination' => [
                'total' => (int)$total,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => (int)$lastPage,
                'from' => $offset + 1,
                'to' => $offset + count($data),
                'has_next' => $page < $lastPage,
                'has_prev' => $page > 1,
            ]
        ];
    }

    public function getStudentViolationInThisMonth()
    {
        $this->db->query(" SELECT
                student_violations.violation_date,
                student_violations.notes as violation_notes,
                student_violations.status as violation_status,
                students.nis as student_nis,
                students.name as student_name,
                classes.rombel as class_rombel,
                majors.name as major_name,
                grade_levels.grade as class_grade,
                violation_types.name as violation_name,
                violation_types.point_value as violation_point
            FROM student_violations
                JOIN students
                    ON student_violations.student_nis = students.nis
                JOIN classes
                    ON students.class_id = classes.id
                JOIN majors
                    ON classes.major_id = majors.id
                JOIN grade_levels
                    ON classes.grade_level_id = grade_levels.id
                JOIN violation_types
                    ON student_violations.violation_type_id = violation_types.id
            WHERE MONTH(student_violations.created_at) = MONTH(NOW())
                AND YEAR(student_violations.created_at) = YEAR(NOW())
            ORDER BY student_violations.created_at DESC
            LIMIT 5;
        ");
        $this->db->execute();
        return $this->db->result();
    }

    public function getSpecialAttentionStudents()
    {
        $this->db->query("SELECT
            	students.nis,
                students.name,
                SUM(violation_types.point_value) as total_points
            FROM student_violations
            	JOIN students ON student_violations.student_nis = students.nis
               	JOIN violation_types ON student_violations.violation_type_id = violation_types.id
            GROUP BY students.nis, students.name
            HAVING total_points > 50;
        ");
        $this->db->execute();
        return $this->db->result();
    }

    public function create(
        $student_nis,
        $violation_type_id,
        $reported_by,
        $violation_date,
        $notes,
        $status
    ) {
        $query = "INSERT INTO student_violations (student_nis, violation_type_id, reported_by, violation_date, notes, status) VALUES ($student_nis, $violation_type_id, $reported_by, $violation_date, $notes, $status)";
        $this->db->query("INSERT INTO student_violations (student_nis, violation_type_id, reported_by, violation_date, notes, status) VALUES (:student_nis, :violation_type_id, :reported_by, :violation_date, :notes, :status)");

        $this->db->bind(":student_nis", $student_nis);
        $this->db->bind(":violation_type_id", $violation_type_id);
        $this->db->bind(":reported_by", $reported_by);
        $this->db->bind(":violation_date", $violation_date);
        $this->db->bind(":notes", $notes);
        $this->db->bind(":status", $status);

        $this->db->execute();
    }

    public function update(
        $id,
        $studentNis,
        $violationTypeId,
        $reportedBy,
        $validatedBy,
        $violationDate,
        $notes,
        $status
    ) {
        $this->db->query("UPDATE student_violations SET
            student_nis=:student_nis,
            violation_type_id=:violation_type_id,
            reported_by=:reported_by,
            validated_by=:validated_by,
            violation_date=:violation_date,
            notes=:notes,
            status=:status
            WHERE id=:id
        ");

        $this->db->bind(":id", $id);
        $this->db->bind(":student_nis", $studentNis);
        $this->db->bind(":violationTypeId", $violationTypeId);
        $this->db->bind(":reported_by", $reportedBy);
        $this->db->bind(":validated_by", $validatedBy);
        $this->db->bind(":violation_date", $violationDate);
        $this->db->bind(":notes", $notes);
        $this->db->bind(":status", $status);

        $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM student_violations WHERE id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
}
