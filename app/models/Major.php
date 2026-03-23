<?php 

class Major extends Model
{
    public function getAllMajors(int $page = 1, int $perPage = 10)
    {
        // Pastikan page minimal 1
        (int) $page = max($page, 1);

        (int) $offset = ($page - 1) * $perPage;

        $this->db->query("SELECT * FROM majors");
        $this->db->execute();
        $data = $this->db->result();

        // Hitung total data
        $this->db->query("SELECT COUNT(*) as total FROM majors");
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

    public function getMajorById(int $id)
    {
        $this->db->query("SELECT * FROM majors WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
        return $this->db->single();
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