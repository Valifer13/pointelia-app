<?php 

class GuardianService
{
    private $db;
    private Guardian $guardianModel;

    public function __construct($db)
    {
        $this->db = $db;
        $this->guardianModel = new Guardian($db);
    }

    public function getAllGuardians(): array
    {
        $guardians = $this->guardianModel->getAllGuardians();

        return [
            'guardians' => $guardians,
        ];
    }

    public function getGuardianDetail($id): array
    {
        if (empty($id)) {
            throw new Exception("ID tidak seharusnya kosong");
        }

        $guardian = $this->guardianModel->getGuardianById($id);

        if (empty($guardian)) {
            throw new Exception("Orang tua/Wali tidak ditemukan");
        }

        return [
            'guardian' => $guardian,
        ];
    }

    public function createGuardian($data): void
    {
        $this->guardianModel->create(
            $data['name'],
            $data['job'],
            $data['phone_number'],
            $data['address'],
        );
    }

    public function getUpdateGuardianFormData($id): array
    {
        $guardian = $this->guardianModel->getGuardianById($id);

        if (empty($guardian)) {
            throw new Exception("Data orang tua/Wali tidak bisa ditemukan.");
        }

        return [
            'guardian' => $guardian,
        ];
    }

    public function updateGuardian($data): void
    {
        $this->guardianModel->update(
            $data['id'],
            $data['name'],
            $data['job'],
            $data['phone_number'],
            $data['address']
        );
    }

    public function deleteGuardian($id): void
    {
        $guardian = $this->guardianModel->getGuardianById($id);

        if (empty($guardian)) {
            throw new Exception("Data orang tua/Wali tidak ditemukan.");
        }

        $this->guardianModel->delete($id);
    }
}