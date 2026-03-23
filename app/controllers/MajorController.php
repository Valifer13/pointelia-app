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
        $data = $this->majorService->getAllMajors(1);

        $this->view("majors/index", $data, "List Jurusan");
    }

    public function index_with_paginaton($page)
    {
        $data = $this->majorService->getAllMajors($page);

        $this->view("majors/index", $data, "List Jurusan");
    }
}