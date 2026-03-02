<?php 

class Guardian extends Model
{
    public function getAllGuardians() {
        $this->db->query("SELECT * FROM guardians");

        $this->db->execute();
        return $this->db->result();
    }

    public function create(
        $name,
        $job,
        $phone_number,
        $address,
    ) {
        // if (
        //     empty($name) ||
        //     empty($job) ||
        //     empty($phone_number) ||
        //     empty($address)
        // ) {
        //     echo "<script>alert('Data must be not null')</script>";
        //     header("Location: " . BASE_URL . "/students");
        //     exit();
        // }

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

?>