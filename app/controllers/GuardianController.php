<?php 

class GuardianController extends Controller
{
    private GuardianService $guadrianService;

    public function __construct()
    {
        $db                    = Database::getInstance();
        $this->guadrianService = new GuardianService($db);
    }

    public function index()
    {
        $data = $this->guadrianService->getAllGuardians();

        $this->view("guardians/index", $data, "List Data Orang Tua");
    }

    public function detail($id)
    {
        $this->view("guardians/detail", [], "Detail Data Orang Tua/Wali");
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            try {
                $this->guadrianService->createGuardian($_POST);
                Flasher::setFlash("Berhasil menambahkan data wali!", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal menambahkan data wali! Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/guardians");
            exit;
        }

        $this->view("guardians/add", [], "Tambah Data Orang Tua/Wali");
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            try {
                $this->guadrianService->updateGuardian($_POST);
                Flasher::setFlash("Berhasil mengubah data wali!", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal mengubah data wali! Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/guardians/edit/" . $id);
            exit;
        }

        $data = $this->guadrianService->getUpdateGuardianFormData($id);
        $this->view("guardians/edit", $data, "Edit Data Orang Tua/Wali");
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            try {
                $this->guadrianService->deleteGuardian($id);
                Flasher::setFlash("Berhasil menghapus data wali!", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal menghapus data wali! Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/guardians");
            exit;
        }
    }
}