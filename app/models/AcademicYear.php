<?php 

class AcademicYear extends Model
{
    public function getAllAcademicYear()
    {
        $this->db->query("SELECT * FROM academic_years");
        $this->db->execute();
        return $this->db->result();
    }

    public function getAcademicYearById($id)
    {
        $this->db->query("SELECT * FROM academic_years WHERE id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
        return $this->db->single();
    }

    public function getCurrentAcademicYear()
    {
        $this->db->query("SELECT * FROM academic_years WHERE is_active='Y'");
        $this->db->execute();
        return $this->db->single();
    }

    public function create($year, $is_active)
    {
        $this->db->query("INSERT INTO academic_years (year, is_active) VALUES (:year, :is_active)");

        $this->db->bind(":year", $year);
        $this->db->bind(":is_active", $is_active);

        $this->db->execute();
    }

    public function update($id, $year, $is_active)
    {
        $this->db->query("UPDATE academic_years SET year=:year, is_active=:is_active WHERE id=:id");

        $this->db->bind(":id", $id);
        $this->db->bind(":year", $year);
        $this->db->bind(":is_active", $is_active);

        $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM academic_years WHERE id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
}