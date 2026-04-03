<?php

class Teacher extends Model
{
    public function getAllTeachers()
    {
        $this->db->query("SELECT * FROM users");
        $this->db->execute();
        return $this->db->result();
    }

    public function getAllTeachersWithRole(int $page = 1, int $perPage = 10)
    {
        $page = max($page, 1);
        $offset = ($page - 1) * $perPage;

        $this->db->query("SELECT
            users.*,
            roles.name AS role
            FROM users
            JOIN roles ON users.role_id = roles.id
            LIMIT $perPage OFFSET $offset
        ");
        $this->db->execute();
        $data = $this->db->result();

        // Hitung total data
        $this->db->query("SELECT COUNT(*) as total FROM users");
        $this->db->execute();
        $total = $this->db->single()['total'];

        // Hitung last page
        $lastPage = ceil($total / $perPage);

        return [
            'data' => $data,
            'pagination' => [
                'total' => (int)$total,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => (int)$lastPage,
                'from' => $offset + 1,
                'to' => $offset + count($data),
                'has_next' => $page < $lastPage,
                'has_prev' => $page > 1,
            ]
        ];
    }

    public function getTeacherByCode(string $code)
    {
        $this->db->query("SELECT
            users.*,
            roles.name AS role
            FROM users
            JOIN roles ON users.role_id = roles.id
            WHERE users.code = :code;
");
        $this->db->bind(":code", $code);
        $this->db->execute();
        return $this->db->single();
    }

    public function getTeacherByUsername(string $username)
    {
        $this->db->query("SELECT
            users.*,
            roles.name AS role
            FROM users
            JOIN roles ON users.role_id = roles.id
            WHERE username=:username;
        ");
        $this->db->bind(":username", $username);
        $this->db->execute();
        return $this->db->single();
    }

    public function getTeacherByRole(string $role_name)
    {
        $this->db->query("SELECT
            users.*,
            roles.name AS role_name
            FROM users 
            JOIN roles ON users.role_id = roles.id
            WHERE roles.name = :role_name AND is_active = 1
        ");
        $this->db->bind(":role_name", $role_name);
        $this->db->execute();
        return $this->db->result();
    }

    public function getTeacherByPosition(string $position)
    {
        $this->db->query("SELECT * FROM users WHERE position = :position AND is_active = 1");
        $this->db->bind(":position", $position);
        $this->db->execute();
        return $this->db->single();
    }

    public function getBkTeacher(string $grade)
    {
        $position = "Guru BK " . $grade;
        $this->db->query("SELECT * FROM users WHERE position = :position AND is_active = 1");
        $this->db->bind(":position", $position);
        $this->db->execute();
        return $this->db->single();
    }

    public function resetPassword(string $code, string $new_password) {
        $this->db->query("UPDATE users SET password=:new_password WHERE code=:code");
        $this->db->bind(":code", $code);
        $this->db->bind(":new_password", $new_password);
        $this->db->execute();
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

        $this->db->execute();
        // if (!$this->db->execute()) {
        //     throw new Exception("Unkown error occured at model level");
        // }
    }

    public function delete(string $code) {
        $this->db->query("DELETE FROM users WHERE code=:code");
        $this->db->bind(":code", $code);
        $this->db->execute();
    }
}
