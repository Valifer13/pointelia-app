<?php

require_once "../app/helpers/hasFilledData.php";

class StudentController extends Controller
{
    private StudentService $studentService;

    public function __construct()
    {
        $db                   = Database::getInstance();
        $this->studentService = new StudentService($db);
    }

    public function index()
    {
        $data = $this->studentService->getAllStudentsWithClasses();
        $this->view("student/index", $data, "List Siswa");
    }

    public function detail($nis)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $this->handleDetailPost($nis);
        }

        try {
            $data = $this->studentService->getStudentDetail($nis);
        } catch (Exception $err) {
            Flasher::setFlash($err->getMessage(), "error");
            header("Location: " . BASE_URL . "/students");
            exit;
        }

        $this->view("student/detail", $data, "Detail Siswa");
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->studentService->createStudent($_POST);
                Flasher::setFlash("Berhasil menyimpan data", "success");
            } catch (Exception $e) {
                Flasher::setFlash("Gagal simpan data: " . $e->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/students");
            exit;
        }

        $data = $this->studentService->getAddStudentFormData();
        $this->view("student/add", $data, "Tambah Siswa");
    }

    public function edit($nis)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->studentService->updateStudent($_POST);
                Flasher::setFlash("Berhasil mengupdate data", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal mengupdate data: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/students/edit/" . $nis);
            exit;
        }

        try {
            $data = $this->studentService->getEditStudentFormData($nis);
        } catch (Exception $err) {
            Flasher::setFlash($err->getMessage(), "error");
            header("Location: " . BASE_URL . "/students");
            exit;
        }
        $this->view("student/edit", $data, "Edit Siswa");
    }

    public function delete($nis)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->studentService->deleteStudent($nis);
            } catch (Exception $err) {
                Flasher::setFlash("Error ditemukan: " . $err->getMessage(), "error");
                header("Location: " . BASE_URL . "/students");
            }

            Flasher::setFlash("Berhasil menghapus data", "success");
            header("Location: " . BASE_URL . "/students");
            exit;
        }

        $this->view("404-page");
    }

    // -------------------------------------------------------------------------
    // Private helpers
    // -------------------------------------------------------------------------

    private function handleDetailPost(string $nis): void
    {
        $action = $_POST['action'] ?? '';

        if ($action === "create-connection") {
            try {
                $this->studentService->connectGuardian($nis, $_POST);
                Flasher::setFlash("Berhasil menghubungkan ke data wali!", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal menghubungkan ke data wali: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/students/detail/" . $nis);
            exit;
        }

        if ($action === "create-guardian-data") {
            try {
                $this->studentService->createGuardianAndConnect($nis, $_POST);
                Flasher::setFlash("Berhasil menghubungkan ke data wali!", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal membuat/menghubungkan data wali: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/students/detail/" . $nis);
            exit;
        }
    }
}
