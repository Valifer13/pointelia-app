<?php 

class Letter extends Model
{
    public function getAllLetters(int $page = 1, int $perPage = 10)
    {
        // Pastikan page minimal 1
        (int) $page = max($page, 1);

        (int) $offset = ($page - 1) * $perPage;

        // Ambil data
        $this->db->query("SELECT * FROM letters LIMIT $perPage OFFSET $offset");
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
        $student_nis,
        $issued_date,
        $status,
        $created_by,
        $validated_by,
        $academic_year_id
    ) {
        $this->db->query("INSERT INTO letters (student_nis, issued_date, status, created_by, validated_by, academic_year_id) VALUES (:student_nis, :issued_date, :status, :created_by, :validated_by, :academic_year_id)");

        $this->db->bind(":student_nis", $student_nis);
        $this->db->bind(":issued_date", $issued_date);
        $this->db->bind(":status", $status);
        $this->db->bind(":created_by", $created_by);
        $this->db->bind(":validated_by", $validated_by);
        $this->db->bind(":academic_year_id", $academic_year_id);

        $this->db->execute();
    }

    public function createInviteLetter(
        $letter_id,
        $reason,
        $schedule
    ) {
        $this->db->query("INSERT INTO invit_letter_detail VALUES (:letter_id, :reason, :schedule)");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->bind(":reason", $reason);
        $this->db->bind(":schedule", $schedule);

        $this->db->execute();
    }

    public function createTransferLetter(
        $letter_id,
        $target_school,
        $reason_for_moving
    ) {
        $this->db->query("INSERT INTO transfer_letter_detail VALUES (:letter_id, :target_school, :reason_for_moving)");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->bind(":target_school", $target_school);
        $this->db->bind(":reason_for_moving", $reason_for_moving);

        $this->db->execute();
    }

    public function createPointDeductionLetter(
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

    public function createPermissionToAttendLetter(
        $letter_id,
        $reason
    ) {
        $this->db->query("INSERT INTO permission_to_attend_letter_detail VALUES (:letter_id, :reason)");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->bind(":reason", $reason);

        $this->db->execute();
    }

    public function createStatementOfAgreementLetter(
        $letter_id,
        $problem
    ) {
        $this->db->query("INSERT INTO statement_of_agreement_letter_detail VALUES (:letter_id, :problem)");

        $this->db->bind(":letter_id", $letter_id);
        $this->db->bind(":problem", $problem);

        $this->db->execute();
    }
}