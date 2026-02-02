<?php

class StudentController extends Controller
{
    public function index()
    {
        $studentModel = $this->loadModel("Student");
        $students = $studentModel->getAllStudents();
        $this->renderView("student/index", ["students" => $students], "List Siswa", "dashboard");
    }
}
