<?php 

class ViolationType extends Model
{
    public function getAllViolationType(): array
    {
        $this->db->query("SELECT * FROM violation_types");
        $this->db->execute();
        return $this->db->result();
    }

    public function getViolationTypeById(int $id): array
    {
        $this->db->query("SELECT * FROM violation_types WHERE id=:id");
        $this->db->bind(":id", $id);
        $this->db->execute();
        return $this->db->single();
    }

    public function create(
        string $name,
        string $description,
        int $point_value
    ) {
        $this->db->query("INSERT INTO violation_types (name, description, point_value) VALUES (:name, :description, :point_value)");

        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);
        $this->db->bind(":point_value", $point_value);

        $this->db->execute();
    }

    public function update(
        int $id,
        string $name,
        string $description,
        int $point_value
    ) {
        $this->db->query("UPDATE violation_types SET name=:name, description=:description, point_value=:point_value WHERE id = :id");

        $this->db->bind(":id", $id);
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);
        $this->db->bind(":point_value", $point_value);

        $this->db->execute();
    }

    public function delete(int $id)
    {
        $this->db->query("DELETE FROM violation_types WHERE id = :id");
        $this->db->bind(":id", $id);
        $this->db->execute();
    }
}