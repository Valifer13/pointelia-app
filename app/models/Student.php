<?php

class Student extends Model
{
    /**
     * Funtion to get data with selector if needed
     * 
     * @param array $fields Select the fields you want to retrieve from the database
     * @param string $condition Validate data with selected field
     * @param array $conditionValue Using for validate data IN query
     */
    public function get(array $fields, array $conditionValue = [], string $condition = "nis") {
        if (empty($fields)) {
            $query = "SELECT * FROM students";
        } else {
            $query = "SELECT " . implode(', ', $fields) . " FROM students";
        }

        if (!empty($conditionValue)) {
            if (count($conditionValue) > 1) {
                $query .= " WHERE " . $condition . " IN ('" . implode("','", $conditionValue) . "')";
            } else {
                $query .= " WHERE " . $condition . " = " . $conditionValue[0];
            }
        }

        $this->db->query($query);
        $this->db->execute();
        return $this->db->result();
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
        $this->db->execute();
        return $this->db->single();
    }

    public function getLastNis()
    {
        $this->db->query("SELECT nis FROM students ORDER BY nis DESC LIMIT 1");
        $this->db->execute();
        return $this->db->single();
    }

    public function create(
        $nis,
        $nisn,
        $name,
        $email,
        $phoneNumber,
        $password,
        $gender,
        $class,
        $address,
    ) {
        $this->db->query(
            "INSERT INTO students (
                nis, nisn, name, email, phone_number, password, gender, class_id, address
            ) VALUES (
                :nis, :nisn, :name, :email, :phone_number, :password, :gender, :class, :address
            )",
        );

        $this->db->bind(":nis", $nis);
        $this->db->bind(":nisn", $nisn);
        $this->db->bind(":name", $name);
        $this->db->bind(":email", $email);
        $this->db->bind(":phone_number", $phoneNumber);
        $this->db->bind(
            ":password",
            password_hash($password, PASSWORD_DEFAULT),
        );
        $this->db->bind(":gender", $gender);
        $this->db->bind(":class", $class);
        $this->db->bind(":address", $address);

        if(!$this->db->execute()) {
            throw new Exception("Unkown error occurred");
        }
    }

    public function update(
        $nis,
        $nisn,
        $name,
        $email,
        $phoneNumber,
        $gender,
        $class,
        $address,
    ) {
        $this->db->query(
            "UPDATE students SET nisn=:nisn, name=:name, email=:email, gender=:gender, class_id=:class_id, address=:address, phone_number=:phone_number WHERE nis=:nis",
        );

        $this->db->bind(":nis", $nis);
        $this->db->bind(":nisn", $nisn);
        $this->db->bind(":gender", $gender);
        $this->db->bind(":name", $name);
        $this->db->bind(":email", $email);
        $this->db->bind(":phone_number", $phoneNumber);
        $this->db->bind(":class_id", $class);
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
