<?php 

require_once '../app/helpers/hasFilledData.php';

class TeacherController extends Controller
{
    public function index()
    {
        $db = Database::getInstance();

        $teacherModel = new Teacher($db);
        $teachers = $teacherModel->getAllTeachers();

        $this->view('teachers/index', [
            "teachers" => $teachers
        ], "List Guru");
    }

    public function detail($id)
    {
        $this->view('teachers/detail', [], "Detail Guru");
    }

    public function add()
    {
        $this->view('teachers/add', [], "Tambah Guru");
    }

    public function edit($id)
    {
        $this->view('teachers/edit', [], "Edit Guru");
    }

    public function delete($id)
    {

    }
}