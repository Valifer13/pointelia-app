<?php

class Student extends Model
{
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
        $nisn,
        $name,
        $email,
        $password,
        $gender,
        $class,
        $address,
    ) {
        // if (
        //     empty($nisn) ||
        //     empty($name) ||
        //     empty($email) ||
        //     empty($password) ||
        //     empty($gender) ||
        //     empty($class) ||
        //     empty($address)
        // ) {
        //     echo "<script>alert('Data must be not null')</script>";
        //     header("Location: " . BASE_URL . "/students");
        //     exit();
        // }

        $this->db->query(
            "INSERT INTO students (nisn, name, email, password, gender, class_id, address) VALUES (:nisn, :name, :email, :password, :gender, :class, :address)",
        );

        $this->db->bind(":nisn", $nisn);
        $this->db->bind(":name", $name);
        $this->db->bind(":email", $email);
        $this->db->bind(
            ":password",
            password_hash($password, PASSWORD_DEFAULT),
        );
        $this->db->bind(":gender", $gender);
        $this->db->bind(":class", $class);
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
