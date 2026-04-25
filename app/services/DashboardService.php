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
        $guardian_agreement_recommendations = $this->studentRecommendations(50, 99, ["Perjanjian Wali", "Panggilan Wali"]);
        $student_agreement_recommendations = $this->studentRecommendations(25, 49, ["Perjanjian Siswa"]);
        $problematic_students = $this->studentRecommendations(100, null, ["Pindah Sekolah"]);

        $data = [
            'violation_in_this_month'               => $violation_in_this_month,
            'count_violation_in_this_month'         => count($violation_in_this_month),
            'count_student_with_special_attentives' => count($student_with_special_attentives),
            'count_guardian_invit_letters'          => count($guardian_invit_letters),
            'student_recommendation' => [
                'student_agreements'   => $student_agreement_recommendations,
                'guardian_agreements'  => $guardian_agreement_recommendations,
                'problematic_students' => $problematic_students
            ],
        ];

        // dd($data);
        return $data;
    }

    // public function studentRecommendations(int $greater_than, int | null $less_than = null, array | null $letter_type = null)
    // {
    //     $students = $this->studentViolationModel->getStudentsByViolationPoint($greater_than, $less_than);
    //     $validated_students = [];

    //     foreach ($students as $student) {
    //         $letters = $this->letterModel->checkStudentLetter($student['nis'], $letter_type);

    //         // dd(['student' => $student, 'letters' => $letters]);

    //         if (!empty($letters)) {
    //             $result = false;
    //             foreach ($letters as $letter) {
    //                 if (in_array($letter['letter_type'], $letter_type, true)) {
    //                     $result = true;
    //                 }
    //             }

    //             if ($result) {
    //                 continue;
    //             }
    //         }

    //         array_push($validated_students, $student);
    //     }

    //     return $validated_students;
    // }

    public function studentRecommendations(int $greater_than, int | null $less_than = null, array | null $letter_type = null)
    {
        $students = $this->studentViolationModel->getStudentsByViolationPoint($greater_than, $less_than);
        $validated_students = [];

        foreach ($students as $student) {
            // Jika tidak ada filter tipe surat, langsung masukkan siswa
            if (empty($letter_type)) {
                array_push($validated_students, $student);
                continue;
            }

            $letters = $this->letterModel->checkStudentLetter($student['nis'], $letter_type);
            
            // Kumpulkan tipe surat yang SUDAH dimiliki siswa ke dalam array satu dimensi
            $existing_letter_types = [];
            if (!empty($letters)) {
                foreach ($letters as $letter) {
                    $existing_letter_types[] = $letter['letter_type'];
                }
            }

            // Cari tahu surat apa yang MASIH KURANG (dibutuhkan - yang sudah ada)
            $missing_letters = array_diff($letter_type, $existing_letter_types);

            // Jika masih ada surat yang kurang (array tidak kosong)
            if (!empty($missing_letters)) {
                // (Opsional tapi disarankan) Tambahkan data surat yang kurang ke array siswa 
                // agar guru tahu pasti surat apa yang harus diproses selanjutnya di frontend
                $student['missing_letters'] = array_values($missing_letters); 
                
                array_push($validated_students, $student);
            }
        }

        return $validated_students;
    }
}
