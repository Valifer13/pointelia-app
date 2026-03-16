<?php 

class GradeLevel extends Model
{
    public function getGradeLevelByName(string $name)
    {
        $this->db->query("SELECT * FROM grade_levels WHERE grade = :name");
        $this->db->bind(":name", $name);
        $this->db->execute();
        return $this->db->single();
    }
}