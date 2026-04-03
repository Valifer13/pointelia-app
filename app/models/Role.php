<?php 

class Role extends Model {
    public function getRoleByName(string $value)
    {
        $this->db->query("SELECT * FROM roles WHERE name=:value");

        $this->db->bind(":value", $value);

        $this->db->execute();
        return $this->db->single();
    }

    public function getRoleById(int $id)
    {
        $this->db->query("SELECT * FROM roles WHERE id=:id");

        $this->db->bind(":id", $id);

        $this->db->execute();
        return $this->db->single();
    }

    public function getAllRoles()
    {
        $this->db->query("SELECT * FROM roles");
        $this->db->execute();
        return $this->db->result();
    }
}