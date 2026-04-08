<?php 

class StudentApiController extends Controller
{
    private StudentService $studentService;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->studentService = new StudentService($db);
    }

    public function detail($nis)
    {
        $data = $this->studentService->getStudentDetail($nis);

        $this->json($data, 200);
    }
}