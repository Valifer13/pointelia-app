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

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->letterService->saveDocumentLetter($_POST, $_FILES['letter_photo']);
                Flasher::setFlash("Berhasil mengkonfirmasi surat!", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal upload foto surat! Error: " . $err->getMessage(), "error");
            }
            header("Location: " . BASE_URL . "/letters");
            exit;
        }

        $data = $this->letterService->getAllLetters(1);

        $this->view("letters/index", $data, "Pembuatan & Cetak Surat");
    }

    public function index_with_pagination($page)
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah', 'guru', 'siswa']);

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->letterService->saveDocumentLetter($_POST, $_FILES['photo_letter']);
                Flasher::setFlash("Berhasil mengkonfirmasi surat!", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal upload foto surat!", "error");
            }
            header("Location: " . BASE_URL . "/letters");
            exit;
        }

        $data = $this->letterService->getAllLetters($page);

        $this->view("letters/index", $data, "Pembuatan & Cetak Surat");
    }

    public function confirmed_document($leter_id)
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);

        $data = $this->letterService->getLetter($leter_id);

        $this->view("letters/confirmed_document", $data, "Bukti Surat Tertanda-tangan");
    }



    //? ======================
    //? Student Agreement
    //? ======================

    public function add_student_agreement_letter()
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);

        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $data = ['student_nis' => $_POST['student_nis']];
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['letter_type'])) {
            try {
                $this->letterService->createLetter($_POST);
                Flasher::setFlash("Berhasil membuat surat.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal membuat surat. Error: " . $err->getMessage(), "error");
            }
            header("Location: " . BASE_URL . "/letters");
            exit;
        }
        // dd($data);
        $this->view("letters/add_student_aggrement_letter", $data, "Buat Surat Perjanjian Siswa");
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

        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $data = ['student_nis' => $_POST['student_nis']];
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['letter_type'])) {
            try {
                $this->letterService->createLetter($_POST);
                Flasher::setFlash("Berhasil membuat surat.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal membuat surat. Error: " . $err->getMessage(), "error");
            }
            header("Location: " . BASE_URL . "/letters");
            exit;
        }
        $this->view("letters/add_guardian_invit_letter", $data, "Buat Surat Panggilan Orang Tua/Wali");
    }

    public function guardian_invit_letter($id)
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);
        $data = $this->letterService->getGuardianInvitLetterDetail($id);
        $this->view("letters/guardian_invit_letter", $data, "Detail Surat Panggilan Orang Tua");
    }



    //? ======================
    //? Guardian Agreement
    //? ======================

    public function add_guardian_agreement_letter()
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);

        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $data = ['student_nis' => $_POST['student_nis']];
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['letter_type'])) {
            try {
                $this->letterService->createLetter($_POST);
                Flasher::setFlash("Berhasil membuat surat.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal membuat surat. Error: " . $err->getMessage(), "error");
            }
            header("Location: " . BASE_URL . "/letters");
            exit;
        }
        $this->view("letters/add_guardian_agreement_letter", $data, "Buat Surat Perjanjian Orang Tua/Wali");
    }

    public function guardian_agreement_letter($id)
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);

        $data = $this->letterService->getGuardianAgreementLetterDetail($id);
        $this->view("letters/guardian_agreement_letter", $data, "Detail Surat Perjanjian Orang Tua");
    }



    //? ======================
    //? Student Transfer
    //? ======================

    public function add_school_transfer_letter()
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);

        $data = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $data = ['student_nis' => $_POST['student_nis']];
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST" && !empty($_POST['letter_type'])) {
            try {
                $this->letterService->createLetter($_POST);
                Flasher::setFlash("Berhasil membuat surat.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal membuat surat. Error: " . $err->getMessage(), "error");
            }
            header("Location: " . BASE_URL . "/letters");
            exit;
        }
        $this->view("letters/add_school_transfer_letter", $data, "Buat Surat Pindah Sekolah");
    }

    public function school_transfer_letter($id)
    {
        AuthMiddleware::checkRole(['admin', 'wakasek', 'kepala sekolah']);
        $data = $this->letterService->getSchoolTransferLetterDetail($id);
        $this->view("letters/school_transfer_letter", $data, "Detail Surat Pindah Sekolah");
    }
}
