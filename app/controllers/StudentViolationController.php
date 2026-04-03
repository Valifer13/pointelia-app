<?php 

class StudentViolationController extends Controller
{
    private StudentViolationService $StudentViolationService;

    public function __construct()
    {
        AuthMiddleware::check();

        $db                            = Database::getInstance();
        $this->StudentViolationService = new StudentViolationService($db);
    }

    public function index()
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah', 'guru', 'siswa']);

        $data = $this->StudentViolationService->getViolations(1);

        $this->view("violations/index", $data, "List Pelanggaran");
    }

    public function index_with_pagination($page)
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah', 'guru', 'siswa']);

        $data = $this->StudentViolationService->getViolations($page);

        $this->view("violations/index", $data, "List Pelanggaran");
    }

    public function detail($student_nis)
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);

        $data = $this->StudentViolationService->getViolationsWithoutPagination($student_nis);

        $this->view("violations/detail", $data, "Detail Pelanggaran Siswa");
    }

    public function add()
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah', 'guru']);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->StudentViolationService->addStudentViolation($_POST);
                Flasher::setFlash("Berhasil menambahkan pelanggaran baru.", "success");
            } catch (PDOException $err) {
                Flasher::setFlash("Gagal menambahkan pelanggaran baru. Error: " . $err->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/violations");
            exit;
        }

        $data = $this->StudentViolationService->getAddStudentViolationFormData();

        $this->view("violations/add", $data, "Tambah Pelanggaran");
    }

    // public function update()
    // {
    //     // code
    //     $this->view("violations/edit", [], "Edit Pelanggaran");
    // }
    
    // public function delete()
    // {
    //     // code
    // }
}