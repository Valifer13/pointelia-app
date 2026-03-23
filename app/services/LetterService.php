<?php

class LetterService
{
    private Letter $letterModel;
    private Guardian $guardianModel;
    private Student $studentModel;
    private AcademicYear $academicYearModel;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $this->letterModel   = new Letter($db);
        $this->guardianModel = new Guardian($db);
        $this->studentModel  = new Student($db);
        $this->academicYearModel = new AcademicYear($db);
    }

    public function getAllLetters(int $page): array
    {
        $letters = $this->letterModel->getAllLetters($page);

        return [
            'letters' => $letters,
        ];
    }

    public function createLetter(array $data): void
    {
        $student = $this->studentModel->getStudentByNis($data['student_nis']);
        $guardian = $this->guardianModel->getGuardianById($data['guardian_id']);
        $currentDate = date('Y-m-d');
        $current_academic_year_id = $this->academicYearModel->getCurrentAcademicYear()['id'];

        if (empty($student)) {
            throw new Exception("Data siswa tidak ditemukan!");
        }

        if (empty($guardian)) {
            throw new Exception("Data wali tidak ditemukan!");
        }

        if (empty($current_academic_year_id)) {
            throw new Exception("Data tahun pelajaran tidak ditemukan!");
        }

        if ($data['letter_type'] === "student-agreement-letter") {
            $this->letterModel->createLetter(
                $data['student_nis'],
                $currentDate,
                null,
                '0021.001',
                '0021.001',
                $current_academic_year_id
            );
        }
    }
}
