<?php 

class StudentViolationController extends Controller
{
    private StudentViolationService $StudentViolationService;

    public function __construct()
    {
        $db                            = Database::getInstance();
        $this->StudentViolationService = new StudentViolationService($db);
    }

    public function index()
    {
        $data = $this->StudentViolationService->getViolations();

        $this->view("violations/index", $data, "List Pelanggaran");
    }

    public function add()
    {
        $data = $this->StudentViolationService->getAddStudentViolationFormData();

        $this->view("violations/add", $data, "Tambah Pelanggaran");
    }

    public function update()
    {
        // code
        $this->view("violations/edit", [], "Edit Pelanggaran");
    }
    
    public function delete()
    {
        // code
    }
}