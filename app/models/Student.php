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
    public function get(array $fields, array $conditionValue = [], string $condition = "nis")
    {
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
        $this->db->query("SELECT name, nis FROM students");
        $this->db->execute();
        return $this->db->result();
    }

    public function getAllStudentsWithPagination(int $page = 1, int $perPage = 10)
    {
        // Pastikan page minimal 1
        (int) $page = max($page, 1);

        (int) $offset = ($page - 1) * $perPage;

        // Ambil data
        $this->db->query("SELECT * FROM students LIMIT $perPage OFFSET $offset");
        $this->db->execute();
        $data = $this->db->result();

        // Hitung total data
        $this->db->query("SELECT COUNT(*) as total FROM students");
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

    public function getStudentByNis(string $nis)
    {
        $this->db->query("SELECT
                students.*,
                majors.name as major_name,
                majors.description as major_description,
                grade_levels.grade as grade,
                classes.rombel as rombel
            FROM students
                JOIN classes ON students.class_id = classes.id
                JOIN majors ON classes.major_id = majors.id
                JOIN grade_levels ON classes.grade_level_id = grade_levels.id
            WHERE students.nis=:nis
        ");
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

        if (!$this->db->execute()) {
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
