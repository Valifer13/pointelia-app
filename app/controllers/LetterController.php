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

    public function detail()
    {
        $this->view("letters/detail", [], "Detail Surat");
    }

    public function add_student_aggrement_letter()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            try {
                $this->letterService->createLetter($_POST);
                Flasher::setFlash("Berhasil membuat surat.", "success");
            } catch (Exception $err) {
                Flasher::setFlash("Gagal membuat surat. Error: " . $err->getMessage(), "error");
            }
            header("Location: " . BASE_URL . "/letters/detail/");
            exit;
        }
        $this->view("letters/add_student_aggrement_letter", [], "Surat Pembuatan Siswa");
    }
}