<?php 

class StudentViolation extends Model
{
    public function getAllViolations()
    {
        $this->db->query("SELECT * FROM student_violations");
        $this->db->execute();
        return $this->db->result();
    }

    public function getAllViolationsByStudentId($studentNis)
    {
        $this->db->query("SELECT * FROM student_violations WHERE student_nis = :student_nis");
        $this->db->bind(":student_nis", $studentNis);
        $this->db->execute();
        return $this->db->result();
    }
}

?>