<?php 

class StudentClassService
{
    private StudentClass $studentClassModel;
    private $db;

    public function __construct($db)
    {
        $this->db                = $db;
        $this->studentClassModel = new StudentClass($db);
    }

    public function createStudentClass($data)
    {
        $this->studentClassModel->create(
            $data['major_id'],
            $data['grade_level_id'],
            $data['form_tutor_code'],
            $data['academic_year_id'],
            $data['rombel']
        );
    }
}