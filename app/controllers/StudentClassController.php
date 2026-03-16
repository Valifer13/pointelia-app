<?php 

class StudentClassController extends Controller
{
    private StudentClassService $studentClassService;

    public function __construct()
    {
        $db                        = Database::getInstance();
        $this->studentClassService = new StudentClassService($db);
    }

    public function index()
    {
        $data = $this->studentClassService->getAllStudentClasses();

        $this->view('classes/index', $data, "List Kelas");
    }

    public function detail($id)
    {
        $data = $this->studentClassService->getDetailStudentClass($id);

        $this->view('classes/detail', $data, "Detail Kelas");
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->studentClassService->createStudentClass($_POST);
                Flasher::setFlash("Berhasil menambahkan data kelas!", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal menambahkan data kelas! Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/classes");
            exit;
        }

        $data = $this->studentClassService->getCreateStudentClassFormData();
        $this->view('classes/add', $data, "Tambah Kelas");
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->studentClassService->editStudentClass($_POST);
                Flasher::setFlash("Berhasil mengubah data kelas!", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal mengubah data kelas! Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/classes/detail/" . $id);
            exit;
        }

        $data = $this->studentClassService->getEditStudentClassFormData($id);
        $this->view('classes/edit', $data, "Edit Kelas");
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->studentClassService->deleteStudentClass($id);
                Flasher::setFlash("Berhasil menghapus data kelas!", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal menghapus data kelas! Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/classes");
            exit;
        }
    }
}