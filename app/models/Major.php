<?php 

class Major extends Model
{
    public function getAllMajors()
    {
        $this->db->query("SELECT * FROM majors");
        $this->db->execute();
        return $this->db->result();
    }

    public function getMajorByName(string $name)
    {
        $this->db->query("SELECT * FROM majors WHERE name = :name");
        $this->db->bind(":name", $name);
        $this->db->execute();
        return $this->db->single();
    }

    public function create(string $name, string $description)
    {
        $this->db->query("INSERT INTO majors (name, description) VALUES (:name, :description)");
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);
        $this->db->execute();
    }

    public function update(int $id, string $name, string $description)
    {
        $this->db->query("UPDATE majors SET name=:name, description=:description WHERE id = :id");

        $this->db->bind(":id", $id);
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);

        $this->db->execute();
    }

    public function delete(int $id)
    {
        $this->db->query("DELETE FROM majors WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
}