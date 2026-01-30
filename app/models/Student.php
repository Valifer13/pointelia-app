<?php

class Student
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllStudents()
    {
        $this->db->query("SELECT * FROM students");
        $this->db->execute();
        return $this->db->result();
    }

    public function getStudentByNis(string $nis)
    {
        $this->db->query("SELECT * FROM students WHERE nis=:nis");
        $this->db->bind(":nis", $nis);
        return $this->db->execute();
    }

    public function create(
        string $nis,
        string $nisn,
        string $name,
        string $email,
        string $password,
        string $gender,
        string $major,
        string $address,
    ) {
        $lastNis = array_last(self::getAllStudents())["nis"];

        $this->db->query(
            "INSERT INTO students (nis, nisn, name, email, gender, major, address) VALUES (:nis, :nisn, :name, :email, :gender, :major, :address)",
        );

        $this->db->bind(":nis", $nis);
        $this->db->bind(":nisn", $nisn);
        $this->db->bind(":name", $name);
        $this->db->bind(":email", $email);
        $this->db->bind(
            ":password",
            password_hash($password, PASSWORD_DEFAULT),
        );
        $this->db->bind(":gender", $gender);
        $this->db->bind(":major", $major);
        $this->db->bind(":address", $address);
        $this->db->execute();
    }

    public function update(
        string $nis,
        string $nisn,
        string $name,
        string $email,
        string $gender,
        string $major,
        string $address,
    ) {
        $this->db->query(
            "UPDATE students SET nisn=:nisn, gender=:gender, major=:major, address=:address WHERE nis=:nis",
        );

        $this->db->bind(":nis", $nis);
        $this->db->bind(":nisn", $nisn);
        $this->db->bind(":gender", $gender);
        $this->db->bind(":name", $name);
        $this->db->bind(":email", $email);
        $this->db->bind(":major", $major);
        $this->db->bind(":address", $address);
        $this->db->execute();
    }

    public function delete(string $nis)
    {
        $this->db->query("DELETE FROM students WHERE nis=:nis");
        $this->db->bind(":nis", $nis);
        $this->db->execute();
    }
}
