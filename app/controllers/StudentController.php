<?php

require_once "../app/helpers/hasFilledData.php";

class StudentController extends Controller
{
    public function index()
    {
        $db = Database::getInstance();

        $studentModel = new Student($db);
        $students = $studentModel->getAllStudents();
        $this->view("student/index", ["students" => $students], "List Siswa", "dashboard");
    }

    public function detail($nis) {
        $db = Database::getInstance();

        $studentModel = new Student($db);
        $student = $studentModel->getStudentByNis($nis);
        $this->view("student/detail", ["student" => $student], "Detail Siswa", "dashboard");
    }

    public function add()
    {
        $db = Database::getInstance();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                $db->beginTransaction();

                $studentModel         = new Student($db);
                $studentClassModel    = new StudentClass($db);
                $guardianModel        = new Guardian($db);
                $studentGuardianModel = new StudentGuardian($db);

                $classId = $studentClassModel->getIdClass($_POST['class'])[0]['id'];

                $studentModel->create(
                    $_POST['nis'],
                    $_POST['nisn'] ?? null,
                    $_POST['name'] ?? null,
                    $_POST['email'] ?? null,
                    $_POST['phone_number'] ?? null,
                    "user123",
                    $_POST['gender'] ?? null,
                    $classId,
                    $_POST['address'] ?? null
                );

                $studentId = $db->lastInsertId();

                if (!empty($_POST['ayah']) && hasFilledData($_POST['ayah'])) {
                    $guardianModel->create(
                        $_POST['ayah']['name'] ?? null,
                        $_POST['ayah']['job'] ?? null,
                        $_POST['ayah']['phone_number'] ?? null,
                        $_POST['ayah']['address'] ?? null
                    );

                    $ayahId = $db->lastInsertId();

                    $studentGuardianModel->connect(
                        $studentId,
                        $ayahId,
                        "Ayah Kandung",
                        $_POST['ayah']['is_primary'] == "true" ? 1 : 0,
                        $_POST['ayah']['lives_with'] == "true" ? 1 : 0
                    );
                }

                if (!empty($_POST['ibu']) && hasFilledData($_POST['ibu'])) {
                    $guardianModel->create(
                        $_POST['ibu']['name'] ?? null,
                        $_POST['ibu']['job'] ?? null,
                        $_POST['ibu']['phone_number'] ?? null,
                        $_POST['ibu']['address'] ?? null
                    );

                    $ibuId = $db->lastInsertId();

                    $studentGuardianModel->connect(
                        $studentId,
                        $ibuId,
                        "Ibu Kandung",
                        $_POST['ibu']['is_primary'] == "true" ? 1 : 0,
                        $_POST['ibu']['lives_with'] == "true" ? 1 : 0
                    );
                }

                if (!empty($_POST['wali']) && hasFilledData($_POST['wali'])) {
                    $guardianModel->create(
                        $_POST['wali']['name'] ?? null,
                        $_POST['wali']['job'] ?? null,
                        $_POST['wali']['phone_number'] ?? null,
                        $_POST['wali']['address'] ?? null
                    );

                    $waliId = $db->lastInsertId();

                    $studentGuardianModel->connect(
                        $studentId,
                        $waliId,
                        $_POST['wali']['relationship'],
                        $_POST['wali']['is_primary'] == "true" ? 1 : 0,
                        $_POST['wali']['lives_with'] == "true" ? 1 : 0
                    );
                }

                $db->commit();

                Flasher::setFlash("Berhasil menyimpan data", "success");
            } catch (Exception $e) {
                $db->rollback();
                Flasher::setFlash("Gagal simpan data: " . $e->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/students");
            exit;
        }

        $studentModel = new Student($db);
        $lastNis = $studentModel->getLastNis();
        $lastNis = intval(str_replace('0', '', $lastNis['nis']));
        $newNis = $lastNis + 1;

        if (empty($lastNis)) {
            $lastNis = 1;
        }

        $studentClassModel = new StudentClass($db);
        $studentClasses = $studentClassModel->getAllStudentClasses();

        $this->view("student/add", ["studentClasses" => $studentClasses, "lastNis" => $newNis], "Tambah Siswa", "dashboard");
    }

    public function delete($nis)
    {
        $db = Database::getInstance();
        $studentModel = new Student($db);
        $studentModel->delete($nis);
        header("Location: " . BASE_URL . "/students");
    }
}
