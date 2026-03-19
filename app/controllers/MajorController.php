<?php 

class MajorController extends Controller
{
    private MajorService $majorService;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->majorService = new MajorService($db);
    }

    public function index()
    {
        $data = $this->majorService->getAllMajors();

        $this->view("majors/index", $data, "List Jurusan");
    }
}