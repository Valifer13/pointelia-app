<?php

class Guardian extends Model
{
    public function getAllGuardians(array $exceptIds = [])
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
}
