<?php

class LetterController extends Controller
{
    private LetterService $letterService;

    public function __construct()
    {
        AuthMiddleware::check();
        $db = Database::getInstance();
        $this->letterService = new LetterService($db);
    }

    public function index()
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah', 'guru', 'siswa']);
        $data = $this->letterService->getAllLetters(1);

        $this->view("letters/index", $data, "Pembuatan & Cetak Surat");
    }

    public function index_with_pagination($page)
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah', 'guru', 'siswa']);
        $data = $this->letterService->getAllLetters($page);

        $this->view("letters/index", $data, "Pembuatan & Cetak Surat");
    }



    //? ======================
    //? Student Agreement
    //? ======================

    public function add_student_agreement_letter()
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);
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
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);
        $data = $this->letterService->getStudentAgreementLetterDetail($id);
        $this->view("letters/student_agreement_letter", $data, "Detail Surat Perjanjian Siswa");
    }



    //? ======================
    //? Guardian Invite
    //? ======================

    public function add_guardian_invit_letter()
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);
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
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);
        $data = $this->letterService->getGuardianInvitLetterDetail($id);
        $this->view("letters/guardian_invit_letter", $data, "Detail Surat Perjanjian Siswa");
    }



    //? ======================
    //? Guardian Agreement
    //? ======================

    public function add_guardian_agreement_letter()
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);
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
        $this->view("letters/add_guardian_agreement_letter", [], "Buat Surat Perjanjian Orang Tua/Wali");
    }

    public function guardian_agreement_letter($id)
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);

        $data = $this->letterService->getGuardianAgreementLetterDetail($id);
        $this->view("letters/guardian_agreement_letter", $data, "Detail Surat Perjanjian");
    }



    //? ======================
    //? Student Transfer
    //? ======================

    public function add_school_transfer_letter()
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);
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
        $this->view("letters/add_school_transfer_letter", [], "Buat Surat Pindah Sekolah");
    }

    public function school_transfer_letter($id)
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);
        $data = $this->letterService->getSchoolTransferLetterDetail($id);
        $this->view("letters/school_transfer_letter", $data, "Detail Surat Pindah Sekolah");
    }
}
