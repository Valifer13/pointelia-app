<?php

class StudentService
{
    private Student $studentModel;
    private StudentClass $studentClassModel;
    private StudentViolation $studentViolationModel;
    private StudentGuardian $studentGuardianModel;
    private Guardian $guardianModel;
    private $db;

    public function __construct($db)
    {
        $this->db                    = $db;
        $this->studentModel          = new Student($db);
        $this->studentClassModel     = new StudentClass($db);
        $this->studentViolationModel = new StudentViolation($db);
        $this->studentGuardianModel  = new StudentGuardian($db);
        $this->guardianModel         = new Guardian($db);
    }

    public function getAllStudentsWithPaginationWithClasses(int $page): array
    {
        $students = $this->studentModel->getAllStudentsWithPagination($page);
        $classes  = [];

        foreach ($students['data'] as $student) {
            $classObj  = $this->studentClassModel->getStudentClassById($student['class_id']);

            if (!empty($classObj)) {
                $classes[] = $classObj['grade'] . " " . $classObj['major_name'] . " " . $classObj['rombel'];
            } else {
                $classes[] = "-";
            }
        }

        return [
            'students' => $students,
            'classes'  => $classes,
        ];
    }

    public function getStudentDetail(string $nis): array
    {
        $student = $this->studentModel->getStudentByNis($nis);

        if (empty($student)) {
            throw new Exception("Siswa dengan nis $nis tidak ditemukan.");
        }

        $studentClass      = $this->studentClassModel->getStudentClassById($student['class_id']);
        $studentViolations = $this->studentViolationModel->getAllViolationsWithTypeByStudentNis($nis);
        $studentGuardians  = $this->studentGuardianModel->getAllGuardianByStudentId($nis);

        [$dataAyah, $dataIbu, $dataWali] = $this->categorizeGuardians($studentGuardians);

        $guardians         = $this->guardianModel->getAllGuardiansWithException([
            $dataAyah['guardian_id'] ?? null,
            $dataIbu['guardian_id']  ?? null,
            $dataWali['guardian_id'] ?? null
        ]);

        return [
            'student'           => $student,
            'studentClass'      => $studentClass,
            'studentViolations' => $studentViolations,
            'dataAyah'          => $dataAyah,
            'dataIbu'           => $dataIbu,
            'dataWali'          => $dataWali,
            'guardians'         => $guardians,
        ];
    }

    public function connectGuardian(string $nis, array $data): void
    {
        $guardianId = explode('-', $data['guardian_name'])[0];

        $this->studentGuardianModel->connect(
            $nis,
            $guardianId,
            $data['relationship'],
            $data['is_primary'] == "true" ? 1 : 0,
            $data['lives_with'] == "true" ? 1 : 0
        );
    }

    public function createGuardianAndConnect(string $nis, array $data): void
    {
        $this->guardianModel->create(
            $data['name']         ?? null,
            $data['job']          ?? null,
            $data['phone_number'] ?? null,
            $data['address']      ?? null
        );

        $guardianId = $this->db->lastInsertId();

        $this->studentGuardianModel->connect(
            $nis,
            $guardianId,
            $data['relationship'],
            $data['is_primary'] == "true" ? 1 : 0,
            $data['lives_with'] == "true" ? 1 : 0
        );
    }

    public function getAddStudentFormData(): array
    {
        $lastNis        = $this->studentModel->getLastNis();
        $newNis         = empty($lastNis) ? 1 : (int)$lastNis['nis'] + 1;
        $studentClasses = $this->studentClassModel->getAllStudentClasses();

        return [
            'studentClasses' => $studentClasses,
            'lastNis'        => $newNis,
        ];
    }

    public function createStudent(array $data): void
    {
        $classId = $this->studentClassModel->getIdClass($data['class'])[0]['id'];

        $this->studentModel->create(
            $data['nis'],
            $data['nisn']         ?? null,
            $data['name']         ?? null,
            $data['email']        ?? null,
            $data['phone_number'] ?? null,
            "user123",
            $data['gender']       ?? null,
            $classId,
            $data['address']      ?? null
        );
    }

    public function getEditStudentFormData(string $nis): array
    {
        $student = $this->studentModel->getStudentByNis($nis);

        if (empty($student)) {
            throw new Exception("Siswa dengan nis $nis tidak ditemukan.");
        }

        $studentClasses = $this->studentClassModel->getAllStudentClasses();
        $studentClass   = $this->studentClassModel->getStudentClassById($student['class_id']);

        return [
            'student'        => $student,
            'studentClasses' => $studentClasses,
            'studentClass'   => $studentClass,
        ];
    }

    public function updateStudent(array $data): void
    {
        $classId = $this->studentClassModel->getIdClass($data['class'])[0]['id'];

        $this->studentModel->update(
            $data['nis'],
            $data['nisn']         ?? null,
            $data['name']         ?? null,
            $data['email']        ?? null,
            $data['phone_number'] ?? null,
            $data['gender']       ?? null,
            $classId,
            $data['address']      ?? null
        );
    }

    public function deleteStudent(string $nis): void
    {
        $student = $this->studentModel->getStudentByNis($nis);

        if (empty($student)) {
            throw new Exception("Siswa dengan nis $nis tidak ditemukan.");
        }

        $this->studentModel->delete($nis);
    }

    // -------------------------------------------------------------------------
    // Private helpers
    // -------------------------------------------------------------------------

    private function categorizeGuardians(array $studentGuardians): array
    {
        $dataAyah = null;
        $dataIbu  = null;
        $dataWali = null;

        foreach ($studentGuardians as $guardian) {
            if ($guardian['relationship'] === "Ayah") {
                $dataAyah = $guardian;
            } elseif ($guardian['relationship'] === "Ibu") {
                $dataIbu = $guardian;
            } else {
                $dataWali = $guardian;
            }
        }

        return [$dataAyah, $dataIbu, $dataWali];
    }
}