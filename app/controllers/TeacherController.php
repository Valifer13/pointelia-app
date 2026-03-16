<?php 

require_once '../app/helpers/hasFilledData.php';

class TeacherController extends Controller
{
    private TeacherService $teacherService;

    public function __construct()
    {
        $db                   = Database::getInstance();
        $this->teacherService = new TeacherService($db);
    }

    public function index()
    {
        $data = $this->teacherService->getAllTeachers();

        $this->view('teachers/index', $data, "List Guru");
    }

    public function detail($code)
    {
        $data = $this->teacherService->getDetailTeacher($code);

        $this->view('teachers/detail', $data, "Detail Guru");
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->teacherService->createTeacherData($_POST);
                Flasher::setFlash("Berhasil menambahkan data guru.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal menambahkan data guru. Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/teachers");
            exit;
        }

        $this->view('teachers/add', [], "Tambah Guru");
    }

    public function edit($code)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->teacherService->updateTeacher($_POST);
                Flasher::setFlash("Berhasil mengubah data guru.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal mengubah data guru. Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/teachers/edit/" . $code);
            exit;
        }

        try {
            $data = $this->teacherService->getEditTeacherFormData($code);
        } catch (Exception $err) {
            Flasher::setFlash($err->getMessage(), "error");
            header("Location: " . BASE_URL . "/teachers");
            exit;
        }

        $this->view('teachers/edit', $data, "Edit Guru");
    }

    public function delete($code)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->teacherService->deleteTeacher($code);
            } catch (Exception $err) {
                Flasher::setFlash("Error ditemukan: " . $err->getMessage(), "error");
                header("Location: " . BASE_URL . "/teachers");
            }

            Flasher::setFlash("Berhasil menghapus data", "success");
            header("Location: " . BASE_URL . "/teachers");
            exit;
        }

        $this->view("404-page");
    }
}