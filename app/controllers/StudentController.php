<?php

class StudentController extends Controller
{
    public function index()
    {
        $studentModel = $this->loadModel("Student");
        $students = $studentModel->getAllStudents();
        $this->renderView("student/students", ["students" => $students], "List Siswa");
    }
}
