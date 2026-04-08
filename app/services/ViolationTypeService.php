<?php 

class ViolationTypeService
{
    private ViolationType $violationTypeModel;
    private $db;

    public function __construct(Database $db)
    {
        $this->violationTypeModel = new ViolationType($db);
        $this->db = $db;
    }

    public function getAllViolationTypeWithPaginations(int $page): array
    {
        $violation_types = $this->violationTypeModel->getAllViolationTypeWithPagination($page);

        return [
            "violation_types" => $violation_types,
        ];
    }

    public function getViolationTypeDetail(int $id): array
    {
        $violationType = $this->violationTypeModel->getViolationTypeById($id);

        if (empty($violationType)) {
            throw new Exception("Tipe pelanggaran tidak ditemukan");
        }

        return [
            'violationType' => $violationType
        ];
    }

    public function createViolationType(array $data): void
    {
        $this->violationTypeModel->create(
            $data['name'],
            $data['description'],
            $data['point_value']
        );
    }

    public function getEditViolationTypeFormData(int $id): array
    {
        $violationType = $this->violationTypeModel->getViolationTypeById($id);

        if (empty($violationType)) {
            throw new Exception("Tipe pelanggaran tidak ditemukan");
        }

        return [
            'violationType' => $violationType
        ];
    }

    public function updateViolationType(array $data): void
    {
        $this->violationTypeModel->update(
            $data['id'],
            $data['name'],
            $data['description'],
            $data['point_value']
        );
    }

    public function deleteViolationType(int $id): void
    {
        $violationType = $this->violationTypeModel->getViolationTypeById($id);

        if (empty($violationType)) {
            throw new Exception("Tipe pelanggaran tidak ditemukan");
        }

        $this->violationTypeModel->delete($id);
    }
}