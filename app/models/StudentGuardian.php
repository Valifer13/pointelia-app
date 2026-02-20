<?php 

class StudentGuardian extends Model
{
    public function connect($studentId, $guardianId, $relationship, $is_primary, $lives_with)
    {
        $this->db->query("INSERT INTO student_guardians (student_id, guardian_id, relationship, is_primary, lives_with) VALUES (:student_id, :guardian_id, :relationship, :is_primary, :lives_with)");

        $this->db->bind(":student_id", $studentId);
        $this->db->bind(":guardian_id", $guardianId);
        $this->db->bind(":relationship", $relationship);
        $this->db->bind(":is_primary", $is_primary);
        $this->db->bind(":lives_with", $lives_with);

        $this->db->execute();
    }
}

?>