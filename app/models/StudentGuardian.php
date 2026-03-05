<?php 

class StudentGuardian extends Model
{
    public function connect($studentId, $guardianId, $relationship, $is_primary, $lives_with)
    {
        try {
            $this->db->query("INSERT INTO student_guardians (student_id, guardian_id, relationship, is_primary, lives_with) VALUES (:student_id, :guardian_id, :relationship, :is_primary, :lives_with)");

            $this->db->bind(":student_id", $studentId);
            $this->db->bind(":guardian_id", $guardianId);
            $this->db->bind(":relationship", $relationship);
            $this->db->bind(":is_primary", $is_primary);
            $this->db->bind(":lives_with", $lives_with);

            $this->db->execute();
        } catch (Exception $err) {
            throw new Error($err->getMessage());
        }
    }

    public function update(
        $id,
        $studentId,
        $guardianId,
        $relationship,
        $is_primary,
        $lives_with,
    ) {
        $this->db->query("UPDATE student_guardians SET student_id=:student_id, guardian_id=:student_id, relationship=:relationship, is_primary=:is_primary, lives_with=:lives_with WHERE id=:id");

        $this->db->bind(":id", $id);
        $this->db->bind(":student_id", $studentId);
        $this->db->bind(":guardian_id", $guardianId);
        $this->db->bind(":relationship", $relationship);
        $this->db->bind(":is_primary", $is_primary);
        $this->db->bind(":lives_with", $lives_with);

        $this->db->execute();
    }

    public function getAllGuardianByStudentId($studentId)
    {
        $this->db->query("SELECT
            student_guardians.relationship AS relationship,
            student_guardians.is_primary AS is_primary,
            student_guardians.lives_with AS lives_with,
            guardians.id AS guardian_id,
            guardians.name AS name,
            guardians.job AS job,
            guardians.address AS address,
            guardians.phone_number AS phone_number
            FROM student_guardians
            JOIN guardians ON student_guardians.guardian_id = guardians.id
            WHERE student_id = :student_id
        ");

        $this->db->bind(":student_id", $studentId);
        $this->db->execute();
        return $this->db->result();
    }
}

?>