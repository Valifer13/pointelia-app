<?php 

class DashboardService
{
    private StudentViolation $studentViolationModel;
    private Letter $letterModel;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $this->studentViolationModel = new StudentViolation($db);
        $this->letterModel = new Letter($db);
    }

    public function getDashboardData()
    {
        $violation_in_this_month = $this->studentViolationModel->getStudentViolationInThisMonth();
        $student_with_special_attentives = $this->studentViolationModel->getSpecialAttentionStudents();
        $guardian_invit_letters = $this->letterModel->getAllGuardianInvitLetters();

        return [
            'violation_in_this_month'               => $violation_in_this_month,
            'count_violation_in_this_month'         => count($violation_in_this_month),
            'count_student_with_special_attentives' => count($student_with_special_attentives),
            'count_guardian_invit_letters'          => count($guardian_invit_letters)
        ];
    }
}