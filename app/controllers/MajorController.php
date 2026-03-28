<?php 

class MajorController extends Controller
{
    private MajorService $majorService;

    public function __construct()
    {
        AuthMiddleware::check();
        $db = Database::getInstance();
        $this->majorService = new MajorService($db);
    }

    public function index()
    {
        $data = $this->majorService->getAllMajors(1);

        $this->view("majors/index", $data, "List Jurusan");
    }

    public function index_with_paginaton($page)
    {
        $data = $this->majorService->getAllMajors($page);

        $this->view("majors/index", $data, "List Jurusan");
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->majorService->createNewMajor($_POST);
                Flasher::setFlash("Berhasil menambah jurusan.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal menambah jurusan. Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/majors");
            exit;
        }

        $this->view("majors/add", [], "Tambah Jurusan");
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === $_POST) {
            try {
                $this->majorService->editMajor($_POST);
                Flasher::setFlash("Berhasil mengubah jurusan.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal mengubah jurusan. Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/majors");
            exit;
        }

        $data = $this->majorService->getEditMajorFormData($id);
        $this->view("majors/edit", $data, "Edit Jurusan");
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->majorService->deleteMajor($id);
                Flasher::setFlash("Berhasil menghapus jurusan.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal menghapus jurusan. Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/majors");
            exit;
        }
    }
}