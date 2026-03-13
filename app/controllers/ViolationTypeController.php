<?php 

class ViolationTypeController extends Controller
{
    private ViolationTypeService $violationTypeService;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->violationTypeService = new ViolationTypeService($db);
    }

    public function index()
    {
        $data = $this->violationTypeService->getAllViolationTypes();

        $this->view("violation-types/index", $data, "List Tipe Pelanggaran");
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->violationTypeService->createViolationType($_POST);
                Flasher::setFlash("Berhasil menambah tipe pelanggaran", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal menambah tipe pelanggaran", "error");
            }

            header('Location: ' . BASE_URL . '/violation-types');
            exit;
        }

        $this->view("violation-types/add", [], "Tambah Tipe Pelanggaran");
    }

    public function detail($id)
    {
        $data = $this->violationTypeService->getViolationTypeDetail($id);
        $this->view("violation-types/detail", $data, "Detail Tipe Pelanggaran");
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->violationTypeService->updateViolationType($_POST);
                Flasher::setFlash("Berhasil mengubah tipe pelanggaran", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal mengubah tipe pelanggaran. Error: " . $err->getMessage(), "error");
            }

            header('Location: ' . BASE_URL . '/violation-types/edit/' . $id);
            exit;
        }

        $data = $this->violationTypeService->getEditViolationTypeFormData($id);
        $this->view("violation-types/edit", $data, "Edit Tipe Pelanggaran");
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $this->violationTypeService->deleteViolationType($id);
                Flasher::setFlash("Berhasil menghapus tipe pelanggaran", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal menghapus tipe pelanggaran. Error: " . $err->getMessage(), "error");
            }

            header('Location: ' . BASE_URL . '/violation-types');
            exit;
        }
    }
}