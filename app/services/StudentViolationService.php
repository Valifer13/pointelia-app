<?php 

class StudentViolationService
{
    private StudentViolation $studentViolationModel;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $this->studentViolationModel = new StudentViolation($db);
    }

    public function getViolations()
    {
        $studentViolations = $this->studentViolationModel->getAllViolationsWithStudentsAndTeachers();

        return [
            'studentViolations' => $studentViolations,
        ];
    }
}