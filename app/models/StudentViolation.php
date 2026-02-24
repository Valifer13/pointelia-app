<?php 

class StudentViolation extends Model
{
    public function getAllViolations()
    {
        $this->db->query("SELECT * FROM student_violations");
        $this->db->execute();
        return $this->db->result();
    }

    public function getAllViolationsByStudentId($studentId)
    {
        $this->db->query("SELECT * FROM student_violations WHERE student_id = :student_id");
        $this->db->bind(":student_id", $studentId);
        $this->db->execute();
        return $this->db->result();
    }
}

?>