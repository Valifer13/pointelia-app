<?php 

class StudentViolationService
{
    private StudentViolation $studentViolationModel;
    private Student $studentModel;
    private ViolationType $violationTypeModel;
    private $db;

    public function __construct($db)
    {
        $this->db                    = $db;
        $this->studentViolationModel = new StudentViolation($db);
        $this->studentModel          = new Student($db);
        $this->violationTypeModel    = new ViolationType($db);
    }

    public function getViolations(int $page): array
    {
        if (AuthMiddleware::checkRoleForBool(['siswa'])) {
            $student_violations = $this->studentViolationModel->getAllViolationsWithStudentsTeachersAndPaginationByNis($_SESSION['user']['id']);
        } else {
            $student_violations = $this->studentViolationModel->getAllViolationsWithStudentsTeachersAndPagination($page);
        }

        return [
            'student_violations' => $student_violations,
        ];
    }

    public function getAddStudentViolationFormData(): array
    {
        $students       = $this->studentModel->getAllStudents();
        $violationTypes = $this->violationTypeModel->getAllViolationType();

        return [
            'students'       => $students,
            'violationTypes' => $violationTypes
        ];
    }

    public function addStudentViolation(array $data): void
    {
        $student        = $this->studentModel->getStudentByNis($data['student_nis']);
        $violation_type = $this->violationTypeModel->getViolationTypeById($data['violation_type']);

        if (empty($student)) {
            throw new Error("Data siswa tidak ditemukan.");
        }

        if (empty($violation_type)) {
            throw new Error("Data tipe pelanggaran tidak ditemukan.");
        }

        $this->studentViolationModel->create(
            $data['student_nis'],
            $data['violation_type'],
            $_SESSION['user']['id'],
            $data['occurrence_date'],
            $data['notes'],
            self::statusConverter($data['status'])
        );
    }

    public function statusConverter(string $status): string | null
    {
        if (empty($status)) {
            return "pending";
        }

        if ($status === "Antrian") { return "pending"; }
        else if ($status === "Diterima") { return "approved"; }
        else if ($status === "Ditolak") { return "rejected"; }
        else { return "pending"; }
    }
}