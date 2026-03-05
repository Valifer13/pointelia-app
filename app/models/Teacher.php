<?php

class Teacher extends Model
{
    public function getAllTeachers()
    {
        $this->db->query("SELECT * FROM users");
        $this->db->execute();
        return $this->db->result();
    }

    public function create() {}
}
