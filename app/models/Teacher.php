<?php

class Teacher extends Model
{
    /**
     * Funtion to get data with selector if needed
     * 
     * @param array $fields Select the fields you want to retrieve from the database
     * @param string $condition Validate data with selected field
     * @param array $conditionValue Using for validate data IN query
     */
    public function get(array $fields, array $conditionValue = [], string $condition = "code") {
        if (empty($fields)) {
            $query = "SELECT * FROM users";
        } else {
            $query = "SELECT " . implode(', ', $fields) . " FROM users";
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

    public function getAllTeachers()
    {
        $this->db->query("SELECT * FROM users");
        $this->db->execute();
        return $this->db->result();
    }

    public function getTeacherByCode(string $code)
    {
        $this->db->query("SELECT * FROM users WHERE code=:code");
        $this->db->bind(":code", $code);
        $this->db->execute();
        return $this->db->single();
    }

    public function create(
        $code,
        $role_id,
        $fullname,
        $username,
        $password,
        $email,
        $phone_number,
        $position,
        $is_active
    ) {
        $this->db->query("INSERT INTO `users` (
            `code`, 
            `role_id`, 
            `fullname`, 
            `username`, 
            `password`, 
            `email`, 
            `phone_number`, 
            `position`, 
            `is_active`, 
            `created_at`, 
            `updated_at`
        ) VALUES (
            :code, 
            :role_id, 
            :fullname, 
            :username, 
            :password, 
            :email,
            :phone_number, 
            :position, 
            :is_active, 
            CURRENT_TIMESTAMP, 
            CURRENT_TIMESTAMP);
        ");

        $this->db->bind(":code", $code);
        $this->db->bind(":role_id", $role_id);
        $this->db->bind(":fullname", $fullname);
        $this->db->bind(":username", $username);
        $this->db->bind(":password", $password);
        $this->db->bind(":email", $email);
        $this->db->bind(":phone_number", $phone_number);
        $this->db->bind(":position", $position);
        $this->db->bind(":is_active", $is_active);

        if (!$this->db->execute()) {
            throw new Exception("Unkown error occured at model level");
        }
    }

    public function update(
        $code,
        $role_id,
        $fullname,
        $username,
        $email,
        $phone_number,
        $position,
        $is_active
    ) {
        $this->db->query("UPDATE users SET
            role_id=:role_id,
            fullname=:fullname,
            username=:username,
            email=:email,
            phone_number=:phone_number,
            position=:position,
            is_active=:is_active
            WHERE code=:code
        ");

        $this->db->bind(":code", $code);
        $this->db->bind(":role_id", $role_id);
        $this->db->bind(":fullname", $fullname);
        $this->db->bind(":username", $username);
        $this->db->bind(":email", $email);
        $this->db->bind(":phone_number", $phone_number);
        $this->db->bind(":position", $position);
        $this->db->bind(":is_active", $is_active);

        if (!$this->db->execute()) {
            throw new Exception("Unkown error occured at model level");
        }
    }

    public function delete(string $code) {
        $this->db->query("DELETE FROM users WHERE code=:code");
        $this->db->bind(":code", $code);
        $this->db->execute();
    }
}
