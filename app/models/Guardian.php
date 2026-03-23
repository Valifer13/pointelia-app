<?php

class Guardian extends Model
{
    public function getAllGuardians(int $page = 1, int $perPage = 10)
    {
        // Pastikan page minimal 1
        (int) $page = max($page, 1);

        (int) $offset = ($page - 1) * $perPage;

        // Ambil data
        $this->db->query("SELECT * FROM guardians LIMIT $perPage OFFSET $offset");
        $this->db->execute();
        $data = $this->db->result();

        // Hitung total data
        $this->db->query("SELECT COUNT(*) as total FROM guardians");
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

    public function getAllGuardiansWithException(array $exceptIds = [])
    {
        $filteredExceptions = array_filter($exceptIds, fn($value) => $value !== null);
        $query = "SELECT * FROM guardians";

        if (!empty($filteredExceptions)) {
            $query .= " WHERE id NOT IN (" . implode(',', $filteredExceptions) . ")";
        }

        $this->db->query($query);
        $this->db->execute();
        return $this->db->result();
    }

    public function getGuardianById($id)
    {
        $this->db->query("SELECT * FROM guardians WHERE id = :id");

        $this->db->bind(":id", $id);

        $this->db->execute();
        return $this->db->single();
    }

    public function create(
        $name,
        $job,
        $phone_number,
        $address,
    ) {
        $this->db->query("INSERT INTO guardians (name, job, phone_number, address) VALUES (:name, :job, :phone_number, :address)");

        $this->db->bind(":name", $name);
        $this->db->bind(":job", $job);
        $this->db->bind(":phone_number", $phone_number);
        $this->db->bind(":address", $address);

        $this->db->execute();
    }

    public function update(
        $id,
        $name,
        $job,
        $phone_number,
        $address,
    ) {
        $this->db->query("UPDATE guardians SET name=:name, job=:job, phone_number=:phone_number, address=:address WHERE id=:id");

        $this->db->bind(":id", $id);
        $this->db->bind(":name", $name);
        $this->db->bind(":job", $job);
        $this->db->bind(":phone_number", $phone_number);
        $this->db->bind(":address", $address);

        $this->db->execute();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM guardians WHERE id = :id");

        $this->db->bind(":id", $id);

        $this->db->execute();
        return $this->db->single();
    }
}
