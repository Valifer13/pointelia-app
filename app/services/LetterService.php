<?php

class LetterService
{
    private Letter $letterModel;
    private Guardian $guardianModel;
    private Student $studentModel;
    private AcademicYear $academicYearModel;
    private Teacher $teacherModel;
    private Database $db;

    public function __construct($db)
    {
        $this->db = $db;
        $this->letterModel   = new Letter($db);
        $this->guardianModel = new Guardian($db);
        $this->studentModel  = new Student($db);
        $this->academicYearModel = new AcademicYear($db);
        $this->teacherModel  = new Teacher($db);
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
        $currentDate = date('Y-m-d');
        $current_academic_year_id = $this->academicYearModel->getCurrentAcademicYear()['id'];

        if (empty($student)) {
            throw new Exception("Data siswa tidak ditemukan!");
        }

        if (empty($current_academic_year_id)) {
            throw new Exception("Data tahun pelajaran tidak ditemukan!");
        }

        if ($data['letter_type'] === "student-agreement-letter") {
            $guardian = $this->guardianModel->getGuardianById($data['guardian_id']);

            if (empty($guardian)) {
                throw new Exception("Data wali tidak ditemukan!");
            }

            try {
                $this->db->beginTransaction();
                $this->letterModel->createLetter(
                    "Perjanjian Siswa",
                    $data['student_nis'],
                    $currentDate,
                    "draft",
                    $_SESSION['user']['id'],
                    $current_academic_year_id
                );

                $lastLetterId = $this->db->lastInsertId();

                $this->letterModel->createStudentAgreementLetterDetail($lastLetterId, $data['guardian_id']);
                $this->db->commit();
                return;
            } catch (PDOException $err) {
                $this->db->rollback();
                throw new Exception($err->getMessage());
            }
            return;
        } else if ($data['letter_type'] === "guardian-invit-letter") {
            $no_letter = $data['no_letter'] . "/SMK TI/BG/" . romawi(date("m")) . "/" . date("Y");
            try {
                $this->db->beginTransaction();
                $this->letterModel->createLetter(
                    "Panggilan Wali",
                    $data['student_nis'],
                    $currentDate,
                    "draft",
                    $_SESSION['user']['id'],
                    $current_academic_year_id,
                    $no_letter
                );

                $lastLetterId = $this->db->lastInsertId();

                $this->letterModel->createGuardianInviteLetterDetail($lastLetterId, $data['reason'], $data['schedule']);
                $this->db->commit();
            } catch (PDOException $err) {
                $this->db->rollback();
                throw new Exception($err->getMessage());
            }
        }
    }

    public function getStudentAgreementLetterDetail($id): array
    {
        $letter = $this->letterModel->findStudentAgreementLetterDetail($id);

        if (empty($letter)) {
            throw new Exception("Data surat tidak ditemukan");
        }

        $bk_teacher = $this->teacherModel->getBkTeacher($letter['grade']);
        $waka_kesiswaan = $this->teacherModel->getTeacherByPosition('Waka Kesiswaan');

        if (empty($bk_teacher)) {
            throw new Exception("Data guru BK tidak ditemukan");
        }

        if (empty($waka_kesiswaan)) {
            throw new Exception("Data Waka Kesiswaan tidak ditemukan");
        }

        return [
            "letter" => $letter,
            "bk_teacher" => $bk_teacher,
            "waka_kesiswaan" => $waka_kesiswaan
        ];
    }

    public function getGuardianInvitLetterDetail($id): array
    {
        $letter = $this->letterModel->findGuardianInvitLetterDetail($id);

        if (empty($letter)) {
            throw new Exception("Data surat tidak ditemukan");
        }

        $bk_teacher = $this->teacherModel->getBkTeacher($letter['grade']);
        $waka_kesiswaan = $this->teacherModel->getTeacherByPosition('Waka Kesiswaan');

        if (empty($bk_teacher)) {
            throw new Exception("Data guru BK tidak ditemukan");
        }

        if (empty($waka_kesiswaan)) {
            throw new Exception("Data Waka Kesiswaan tidak ditemukan");
        }

        return [
            "letter" => $letter,
            "bk_teacher" => $bk_teacher,
            "waka_kesiswaan" => $waka_kesiswaan
        ];
    }
}
