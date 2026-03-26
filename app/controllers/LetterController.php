<?php

class LetterController extends Controller
{
    private LetterService $letterService;

    public function __construct()
    {
        $db = Database::getInstance();
        $this->letterService = new LetterService($db);
    }

    public function index()
    {
        $data = $this->letterService->getAllLetters(1);

        $this->view("letters/index", $data, "Pembuatan & Cetak Surat");
    }



    //? ======================
    //? Student Agreement
    //? ======================

    public function add_student_agreement_letter()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->letterService->createLetter($_POST);
                Flasher::setFlash("Berhasil membuat surat.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal membuat surat. Error: " . $err->getMessage(), "error");
            }
            header("Location: " . BASE_URL . "/letters");
            exit;
        }
        $this->view("letters/add_student_aggrement_letter", [], "Buat Surat Perjanjian Siswa");
    }

    public function student_agreement_letter($id)
    {
        $data = $this->letterService->getStudentAgreementLetterDetail($id);
        $this->view("letters/student_agreement_letter", $data, "Detail Surat Perjanjian Siswa");
    }



    //? ======================
    //? Guardian Invite
    //? ======================

    public function add_guardian_invit_letter()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->letterService->createLetter($_POST);
                Flasher::setFlash("Berhasil membuat surat.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal membuat surat. Error: " . $err->getMessage(), "error");
            }
            header("Location: " . BASE_URL . "/letters");
            exit;
        }
        $this->view("letters/add_guardian_invit_letter", [], "Buat Surat Panggilan Orang Tua/Wali");
    }

    public function guardian_invit_letter($id)
    {
        $data = $this->letterService->getGuardianInvitLetterDetail($id);
        $this->view("letters/guardian_invit_letter", $data, "Detail Surat Perjanjian Siswa");
    }

    //? ======================
    //? Guardian Invite
    //? ======================
}
