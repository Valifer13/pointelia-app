<?php 

class Letter extends Model
{
    public function getAllLetters(int $page = 1, int $perPage = 10)
    {
        // Pastikan page minimal 1
        (int) $page = max($page, 1);

        (int) $offset = ($page - 1) * $perPage;

        // Ambil data
        $this->db->query("SELECT
                letters.id as letter_id,
                letters.no_letter,
                letters.letter_type,
                letters.issued_date,
                letters.status as letter_status,
                students.nis as student_nis,
                students.name as student_name,
                creator.code as creator_code,
                creator.fullname as creator_fullname,
                academic_years.year as academic_year
            FROM letters
                JOIN students ON letters.student_nis = students.nis
                JOIN users as creator ON letters.created_by = creator.code
                JOIN academic_years ON letters.academic_year_id = academic_years.id
            ORDER BY letters.created_at DESC
            LIMIT $perPage OFFSET $offset;
        ");
        $this->db->execute();
        $data = $this->db->result();

        // Hitung total data
        $this->db->query("SELECT COUNT(*) as total FROM letters");
        $this->db->execute();
        $total = $this->db->single()['total'];

        // Hitung last page
        $lastPage = ceil($total / $perPage);

        return [
            'data' => $data,
            'pagination' => [
                'total' => (int)$total,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => (int)$lastPage,
                'from' => $offset + 1,
                'to' => $offset + count($data),
                'has_next' => $page < $lastPage,
                'has_prev' => $page > 1,
            ]
        ];
    }

    public function getAllLettersByStudentNis(string $student_nis, int $page = 1, int $perPage = 10)
    {
        // Pastikan page minimal 1
        (int) $page = max($page, 1);

        (int) $offset = ($page - 1) * $perPage;

        // Ambil data
        $this->db->query("SELECT
                letters.id as letter_id,
                letters.no_letter,
                letters.letter_type,
                letters.issued_date,
                letters.status as letter_status,
                students.nis as student_nis,
                students.name as student_name,
                creator.code as creator_code,
                creator.fullname as creator_fullname,
                academic_years.year as academic_year
            FROM letters
                JOIN students ON letters.student_nis = students.nis
                JOIN users as creator ON letters.created_by = creator.code
                JOIN academic_years ON letters.academic_year_id = academic_years.id
            WHERE letters.student_nis = :student_nis
            ORDER BY letters.created_at DESC
            LIMIT $perPage OFFSET $offset;
        ");
        $this->db->bind(":student_nis", $student_nis);
        $this->db->execute();
        $data = $this->db->result();

        // Hitung total data
        $this->db->query("SELECT COUNT(*) as total FROM letters WHERE student_nis = :student_nis");
        $this->db->bind(":student_nis", $student_nis);
        $this->db->execute();
        $total = $this->db->single()['total'];

        // Hitung last page
        $lastPage = ceil($total / $perPage);

        return [
            'data' => $data,
            'pagination' => [
                'total' => (int)$total,
                'per_page' => $perPage,
                'current_page' => $page,
                'last_page' => (int)$lastPage,
                'from' => $offset + 1,
                'to' => $offset + count($data),
                'has_next' => $page < $lastPage,
                'has_prev' => $page > 1,
            ]
        ];
    }
    
    public function createLetterType(
        $code,
        $name,
        $description
    ) {
        $this->db->query("INSERT INTO letter_types VALUES (:code, :name, :description)");
        
        $this->db->bind(":code", $code);
        $this->db->bind(":name", $name);
        $this->db->bind(":description", $description);

        $this->db->execute();
    }

    public function createLetter(
        $letter_type,
        $student_nis,
        $issued_date,
        $status,
        $created_by,
        $academic_year_id,
        $no_letter = null
    ) {
        if (!empty($no_letter)) {
            $query = "INSERT INTO letters (letter_type, no_letter, student_nis, issued_date, status, created_by, academic_year_id) VALUES (:letter_type, :no_letter, :student_nis, :issued_date, :status, :created_by, :academic_year_id)";
        } else {
            $query = "INSERT INTO letters (letter_type, student_nis, issued_date, status, created_by, academic_year_id) VALUES (:letter_type, :student_nis, :issued_date, :status, :created_by, :academic_year_id)";
        }

        $this->db->query($query);

        if (!empty($no_letter)) {
            $this->db->bind(":no_letter", $no_letter);
        }

        $this->db->bind(":letter_type", $letter_type);
        $this->db->bind(":student_nis", $student_nis);
        $this->db->bind(":issued_date", $issued_date);
        $this->db->bind(":status", $status);
        $this->db->bind(":created_by", $created_by);
        $this->db->bind(":academic_year_id", $academic_year_id);

        $this->db->execute();
    }



    //? ======================
    //? Guardian Invite Letter
    //? ======================

    public function createGuardianInviteLetterDetail(
        $letter_id,
        $reason,
        $schedule
    ) {
        $this->db->query("INSERT INTO guardian_invit_letter_detail VALUES (:letter_id, :reason, :schedule)");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->bind(":reason", $reason);
        $this->db->bind(":schedule", $schedule);

        $this->db->execute();
    }

    public function getAllGuardianInvitLetters()
    {
        $this->db->query("SELECT * FROM letters WHERE letter_type = 'Panggilan Wali'");
        $this->db->execute();
        return $this->db->result();
    }

    public function findGuardianInvitLetterDetail($letter_id)
    {
        $this->db->query("SELECT
                guardian_invit_letter_detail.reason as invit_reason,
                guardian_invit_letter_detail.schedule as invit_schedule,
                letters.id as letter_id,
                letters.no_letter,
                letters.letter_type,
                letters.issued_date,
                letters.status,
                students.nis as student_nis,
                students.name as student_name,
                classes.rombel as class_rombel,
                majors.name as major_name,
                majors.description as major_description,
                grade_levels.grade,
                academic_years.year as academic_year
            FROM guardian_invit_letter_detail
                JOIN letters 
                    ON guardian_invit_letter_detail.letter_id = letters.id
                JOIN students 
                    ON letters.student_nis = students.nis
                JOIN classes 
                    ON students.class_id = classes.id
                JOIN majors 
                    ON classes.major_id = majors.id
                JOIN grade_levels 
                    ON classes.grade_level_id = grade_levels.id
                JOIN academic_years 
                    ON letters.academic_year_id = academic_years.id
            WHERE letters.id = :letter_id;
        ");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->execute();
        return $this->db->single();
    }



    //? ======================
    //? Transfer Letter
    //? ======================

    public function createSchoolTransferLetterDetail(
        $letter_id,
        $guardian_id,
        $target_school,
        $reason_for_moving
    ) {
        $this->db->query("INSERT INTO transfer_letter_detail VALUES (:letter_id, :guardian_id, :target_school, :reason_for_moving)");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->bind(":guardian_id", $guardian_id);
        $this->db->bind(":target_school", $target_school);
        $this->db->bind(":reason_for_moving", $reason_for_moving);

        $this->db->execute();
    }

    public function findSchoolTransferLetterDetail($letter_id)
    {
        $this->db->query("SELECT
                transfer_letter_detail.target_school,
                transfer_letter_detail.reason_for_moving,
                letters.id as letter_id,
                letters.no_letter,
                letters.letter_type,
                letters.issued_date,
                letters.status,
                students.nis as student_nis,
                students.name as student_name,
                students.gender as student_gender,
                students.address as student_address,
                classes.rombel as class_rombel,
                majors.name as major_name,
                majors.description as major_description,
                grade_levels.grade,
                guardians.name as guardian_name,
                guardians.job as guardian_job,
                guardians.address as guardian_address,
                guardians.phone_number as guardian_phone_number,
                academic_years.year as academic_year
            FROM transfer_letter_detail
                JOIN letters 
                    ON transfer_letter_detail.letter_id = letters.id
                JOIN students 
                    ON letters.student_nis = students.nis
                JOIN guardians 
                    ON transfer_letter_detail.guardian_id = guardians.id
                JOIN classes 
                    ON students.class_id = classes.id
                JOIN majors 
                    ON classes.major_id = majors.id
                JOIN grade_levels 
                    ON classes.grade_level_id = grade_levels.id
                JOIN academic_years 
                    ON letters.academic_year_id = academic_years.id
            WHERE letters.id = :letter_id;
        ");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->execute();
        return $this->db->single();
    }



    //? ======================
    //? Point Reduction
    //? ======================

    public function createPointDeductionLetterDetail(
        $letter_id,
        $reason,
        $deduction_amount
    ) {
        $this->db->query("INSERT INTO point_deduction_letter_detail VALUES (:letter_id, :reason, :deduction_amount)");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->bind(":reason", $reason);
        $this->db->bind(":deduction_amount", $deduction_amount);

        $this->db->execute();
    }
    


    //? =========================
    //? Guardian Agreement Letter
    //? =========================

    public function createGuardianAgreementLetterDetail(
        $letter_id,
        $guardian_id,
        $guardian_birthplace,
        $guardian_date_of_birth
    ) {
        $this->db->query("INSERT INTO guardian_agreement_letter_detail VALUES (:letter_id, :guardian_id, :guardian_birthplace, :guardian_date_of_birth)");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->bind(":guardian_id", $guardian_id);
        $this->db->bind(":guardian_birthplace", $guardian_birthplace);
        $this->db->bind(":guardian_date_of_birth", $guardian_date_of_birth);

        $this->db->execute();
    }

    public function findGuardianAgreementLetterDetail($letter_id)
    {
        $this->db->query("SELECT
                guardian_agreement_letter_detail.guardian_birthplace,
                guardian_agreement_letter_detail.guardian_date_of_birth,
                letters.id as letter_id,
                letters.no_letter,
                letters.letter_type,
                letters.issued_date,
                letters.status,
                students.nis as student_nis,
                students.name as student_name,
                classes.rombel as class_rombel,
                majors.name as major_name,
                majors.description as major_description,
                grade_levels.grade,
                guardians.name as guardian_name,
                guardians.job as guardian_job,
                guardians.address as guardian_address,
                guardians.phone_number as guardian_phone_number,
                academic_years.year as academic_year
            FROM guardian_agreement_letter_detail
                JOIN letters 
                    ON guardian_agreement_letter_detail.letter_id = letters.id
                JOIN guardians 
                    ON guardian_agreement_letter_detail.guardian_id = guardians.id
                JOIN students 
                    ON letters.student_nis = students.nis
                JOIN classes 
                    ON students.class_id = classes.id
                JOIN majors 
                    ON classes.major_id = majors.id
                JOIN grade_levels 
                    ON classes.grade_level_id = grade_levels.id
                JOIN academic_years 
                    ON letters.academic_year_id = academic_years.id
            WHERE letters.id = :letter_id;
        ");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->execute();
        return $this->db->single();
    }



    //? =========================
    //? Student Agreement Letter
    //? =========================

    public function createStudentAgreementLetterDetail(
        $letter_id,
        $guardian_id
    ) {
        $this->db->query("INSERT INTO student_agreement_letter_detail VALUES (:letter_id, :guardian_id)");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->bind(":guardian_id", $guardian_id);

        $this->db->execute();
    }

    public function findStudentAgreementLetterDetail($letter_id)
    {
        $this->db->query("SELECT
                letters.id as letter_id,
                letters.no_letter,
                letters.letter_type,
                letters.issued_date,
                letters.status,
                students.nis as student_nis,
                students.name as student_name,
                classes.rombel as class_rombel,
                majors.name as major_name,
                majors.description as major_description,
                grade_levels.grade,
                guardians.name as guardian_name,
                guardians.job as guardian_job,
                guardians.address as guardian_address,
                guardians.phone_number as guardian_phone_number,
                academic_years.year as academic_year,
                users.fullname as class_form_tutor_fullname
            FROM student_agreement_letter_detail
                JOIN letters 
                    ON student_agreement_letter_detail.letter_id = letters.id
                JOIN students 
                    ON letters.student_nis = students.nis
                JOIN classes 
                    ON students.class_id = classes.id
                JOIN majors 
                    ON classes.major_id = majors.id
                JOIN grade_levels 
                    ON classes.grade_level_id = grade_levels.id
                JOIN guardians 
                    ON student_agreement_letter_detail.guardian_id = guardians.id
                JOIN academic_years 
                    ON letters.academic_year_id = academic_years.id
                JOIN users
                    ON classes.form_tutor_code = users.code
            WHERE letters.id = :letter_id;
        ");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->execute();
        return $this->db->single();
    }
}