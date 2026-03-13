<?php 

class StudentViolationService
{
    private StudentViolation $studentViolationModel;
    private Student $studentModel;
    private ViolationType $violationTypeModel;
    private $db;

    public function __construct($db)
    {
        $this->db                    = $db;
        $this->studentViolationModel = new StudentViolation($db);
        $this->studentModel          = new Student($db);
        $this->violationTypeModel    = new ViolationType($db);
    }

    public function getViolations(): array
    {
        $studentViolations = $this->studentViolationModel->getAllViolationsWithStudentsAndTeachers();

        return [
            'studentViolations' => $studentViolations,
        ];
    }

    public function getAddStudentViolationFormData(): array
    {
        $students       = $this->studentModel->getAllStudents();
        $violationTypes = $this->violationTypeModel->getAllViolationType();

        return [
            'students'       => $students,
            'violationTypes' => $violationTypes
        ];
    }
}