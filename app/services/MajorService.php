<?php 

class MajorService
{
    private Major $majorModel;
    private $db;

    public function __construct(Database $db)
    {
        $this->majorModel = new Major($db);
        $this->db = $db;
    }

    public function getAllMajors(int $page): array
    {
        $majors = $this->majorModel->getAllMajors($page);

        return [
            'majors' => $majors,
        ];
    }

    public function getDetailMajor($id): array
    {
        $major = $this->majorModel->getMajorById($id);

        if (empty($major)) {
            throw new Exception("Data jurusan tidak ditemukan");
        }

        return [
            'major' => $major,
        ];
    }

    public function createNewMajor(array $data): void
    {
        $this->majorModel->create(
            $data['name'],
            $data['description']
        );
    }

    public function getEditMajorFormData(int $id): array
    {
        $major = $this->majorModel->getMajorById($id);

        if (empty($major)) {
            throw new Exception("Data jurusan tidak ditemukan");
        }

        return [
            'major' => $major,
        ];
    }

    public function editMajor(array $data): void
    {
        $major = $this->majorModel->getMajorById($data['id']);

        if (empty($major)) {
            throw new Exception("Data jurusan tidak ditemukan");
        }

        $this->majorModel->update(
            $data['id'],
            $data['name'],
            $data['description']
        );
    }

    public function deleteMajor(int $id): void
    {
        $major = $this->majorModel->getMajorById($id);

        if (empty($major)) {
            throw new Exception("Data jurusan tidak ditemukan");
        }

        $this->majorModel->delete($id);
    }
}