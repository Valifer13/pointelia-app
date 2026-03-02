<?php

require_once "../app/helpers/hasFilledData.php";

class StudentController extends Controller
{
    public function index()
    {
        $db = Database::getInstance();

        $studentModel      = new Student($db);
        $studentClassModel = new StudentClass($db);

        $students = $studentModel->getAllStudents();
        $classes  = [];

        foreach ($students as $student) {
            $classObj =  $studentClassModel->getStudentClassById($student['class_id']);
            $class    = $classObj['grade'] . " " . $classObj['major_name'] . " " . $classObj['rombel'];
            array_push($classes, $class);
        }

        $this->view("student/index", [
            "students"  => $students,
            "classes"   => $classes,
        ], "List Siswa", "dashboard");
    }

    public function detail($nis)
    {
        $db = Database::getInstance();

        $studentModel          = new Student($db);
        $studentClassModel     = new StudentClass($db);
        $studentViolationModel = new StudentViolation($db);
        $studentGuardianModel  = new StudentGuardian($db);
        $guardianModel         = new Guardian($db);

        $student           = $studentModel->getStudentByNis($nis);
        $studentClass      = $studentClassModel->getStudentClassById($student['class_id']);
        $studentViolations = $studentViolationModel->getAllViolationsByStudentId($student['id']);
        $studentGuardians  = $studentGuardianModel->getAllGuardianByStudentId($student['id']);
        $guardians         = $guardianModel->getAllGuardians();

        $dataAyah = null;
        $dataIbu  = null;
        $dataWali = null;

        foreach ($studentGuardians as $studentGuardian) {
            if ($studentGuardian['relationship'] === "Ayah Kandung") {
                $dataAyah = $studentGuardian;
                continue;
            }
            
            if ($studentGuardian['relationship'] === "Ibu Kandung") {
                $dataIbu = $studentGuardian;
                continue;
            }
            
            if ($studentGuardian['relationship'] !== "Ibu Kandung" || $studentGuardian['relationship'] !== "Ayah Kandung") {
                $dataWali = $studentGuardian;
                continue;
            }
        }

        $this->view("student/detail", [
            "student"           => $student,
            "studentClass"      => $studentClass,
            "studentViolations" => $studentViolations,
            "dataAyah"          => $dataAyah,
            "dataIbu"           => $dataIbu,
            "dataWali"          => $dataWali,
            "guardians"         => $guardians
        ], "Detail Siswa", "dashboard");
    }

    public function add()
    {
        $db = Database::getInstance();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                $db->beginTransaction();

                $studentModel         = new Student($db);
                $studentClassModel    = new StudentClass($db);
                // $guardianModel        = new Guardian($db);
                // $studentGuardianModel = new StudentGuardian($db);

                $classId = $studentClassModel->getIdClass($_POST['class'])[0]['id'];

                $studentModel->create(
                    $_POST['nis'],
                    $_POST['nisn']         ?? null,
                    $_POST['name']         ?? null,
                    $_POST['email']        ?? null,
                    $_POST['phone_number'] ?? null,
                    "user123",
                    $_POST['gender']       ?? null,
                    $classId,
                    $_POST['address']      ?? null
                );

                // $studentId = $db->lastInsertId();

                // if (!empty($_POST['ayah']) && hasFilledData($_POST['ayah'])) {
                //     $guardianModel->create(
                //         $_POST['ayah']['name']         ?? null,
                //         $_POST['ayah']['job']          ?? null,
                //         $_POST['ayah']['phone_number'] ?? null,
                //         $_POST['ayah']['address']      ?? null
                //     );

                //     $ayahId = $db->lastInsertId();

                //     $studentGuardianModel->connect(
                //         $studentId,
                //         $ayahId,
                //         "Ayah Kandung",
                //         $_POST['ayah']['is_primary'] == "true" ? 1 : 0,
                //         $_POST['ayah']['lives_with'] == "true" ? 1 : 0
                //     );
                // }

                // if (!empty($_POST['ibu']) && hasFilledData($_POST['ibu'])) {
                //     $guardianModel->create(
                //         $_POST['ibu']['name']         ?? null,
                //         $_POST['ibu']['job']          ?? null,
                //         $_POST['ibu']['phone_number'] ?? null,
                //         $_POST['ibu']['address']      ?? null
                //     );

                //     $ibuId = $db->lastInsertId();

                //     $studentGuardianModel->connect(
                //         $studentId,
                //         $ibuId,
                //         "Ibu Kandung",
                //         $_POST['ibu']['is_primary'] == "true" ? 1 : 0,
                //         $_POST['ibu']['lives_with'] == "true" ? 1 : 0
                //     );
                // }

                // if (!empty($_POST['wali']) && hasFilledData($_POST['wali'])) {
                //     $guardianModel->create(
                //         $_POST['wali']['name']         ?? null,
                //         $_POST['wali']['job']          ?? null,
                //         $_POST['wali']['phone_number'] ?? null,
                //         $_POST['wali']['address']      ?? null
                //     );

                //     $waliId = $db->lastInsertId();

                //     $studentGuardianModel->connect(
                //         $studentId,
                //         $waliId,
                //         $_POST['wali']['relationship'],
                //         $_POST['wali']['is_primary'] == "true" ? 1 : 0,
                //         $_POST['wali']['lives_with'] == "true" ? 1 : 0
                //     );
                // }

                $db->commit();

                Flasher::setFlash("Berhasil menyimpan data", "success");
            } catch (Exception $e) {
                $db->rollback();
                Flasher::setFlash("Gagal simpan data: " . $e->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/students");
            exit;
        }

        $studentModel = new Student($db);
        $lastNis      = $studentModel->getLastNis();
        $newNis       = (int)$lastNis['nis'] + 1;

        if (empty($lastNis)) {
            $lastNis = 1;
        }

        $studentClassModel = new StudentClass($db);
        $studentClasses    = $studentClassModel->getAllStudentClasses();

        $this->view("student/add", [
            "studentClasses" => $studentClasses,
            "lastNis"        => $newNis
        ], "Tambah Siswa", "dashboard");
    }

    public function edit($nis) {
        $db = Database::getInstance();

        $studentClassModel    = new StudentClass($db);
        $studentModel         = new Student($db);
        // $studentGuardianModel = new StudentGuardian($db);

        $student          = $studentModel->getStudentByNis($nis);
        // $studentGuardians = $studentGuardianModel->getAllGuardianByStudentId($student['id']);
        $studentClasses   = $studentClassModel->getAllStudentClasses();
        $studentClass     = $studentClassModel->getStudentClassById($student['class_id']);

        $dataAyah = null;
        $dataIbu  = null;
        $dataWali = null;

        // foreach ($studentGuardians as $studentGuardian) {
        //     if ($studentGuardian['relationship'] === "Ayah Kandung") {
        //         $dataAyah = $studentGuardian;
        //         continue;
        //     }
            
        //     if ($studentGuardian['relationship'] === "Ibu Kandung") {
        //         $dataIbu = $studentGuardian;
        //         continue;
        //     }
            
        //     if ($studentGuardian['relationship'] !== "Ibu Kandung" || $studentGuardian['relationship'] !== "Ayah Kandung") {
        //         $dataWali = $studentGuardian;
        //         continue;
        //     }
        // }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            try {
                $db->beginTransaction();

                // $guardianModel = new Guardian($db);
                $classId       = $studentClassModel->getIdClass($_POST['class'])[0]['id'];

                $studentModel->update(
                    $_POST['nis'],
                    $_POST['nisn']         ?? null,
                    $_POST['name']         ?? null,
                    $_POST['email']        ?? null,
                    $_POST['phone_number'] ?? null,
                    "user123",
                    $_POST['gender']       ?? null,
                    $classId,
                    $_POST['address']      ?? null
                );

                // $studentId = $db->lastInsertId();

                // if (!empty($_POST['ayah']) && hasFilledData($_POST['ayah'])) {
                //     $guardianModel->create(
                //         $_POST['ayah']['name']         ?? null,
                //         $_POST['ayah']['job']          ?? null,
                //         $_POST['ayah']['phone_number'] ?? null,
                //         $_POST['ayah']['address']      ?? null
                //     );

                //     $ayahId = $db->lastInsertId();

                //     $studentGuardianModel->connect(
                //         $studentId,
                //         $ayahId,
                //         "Ayah Kandung",
                //         $_POST['ayah']['is_primary'] == "true" ? 1 : 0,
                //         $_POST['ayah']['lives_with'] == "true" ? 1 : 0
                //     );
                // }

                // if (!empty($_POST['ibu']) && hasFilledData($_POST['ibu'])) {
                //     $guardianModel->create(
                //         $_POST['ibu']['name']         ?? null,
                //         $_POST['ibu']['job']          ?? null,
                //         $_POST['ibu']['phone_number'] ?? null,
                //         $_POST['ibu']['address']      ?? null
                //     );

                //     $ibuId = $db->lastInsertId();

                //     $studentGuardianModel->connect(
                //         $studentId,
                //         $ibuId,
                //         "Ibu Kandung",
                //         $_POST['ibu']['is_primary'] == "true" ? 1 : 0,
                //         $_POST['ibu']['lives_with'] == "true" ? 1 : 0
                //     );
                // }

                // if (!empty($_POST['wali']) && hasFilledData($_POST['wali'])) {
                //     $guardianModel->create(
                //         $_POST['wali']['name']         ?? null,
                //         $_POST['wali']['job']          ?? null,
                //         $_POST['wali']['phone_number'] ?? null,
                //         $_POST['wali']['address']      ?? null
                //     );

                //     $waliId = $db->lastInsertId();

                //     $studentGuardianModel->connect(
                //         $studentId,
                //         $waliId,
                //         $_POST['wali']['relationship'],
                //         $_POST['wali']['is_primary'] == "true" ? 1 : 0,
                //         $_POST['wali']['lives_with'] == "true" ? 1 : 0
                //     );
                // }

                $db->commit();

                Flasher::setFlash("Berhasil menyimpan data", "success");
            } catch (Exception $e) {
                $db->rollback();
                Flasher::setFlash("Gagal simpan data: " . $e->getMessage(), "error");
            }

            header("Location: " . BASE_URL . "/students");
            exit;
        }

        $this->view("student/edit", [
            "student"        => $student,
            "studentClasses" => $studentClasses,
            "studentClass"   => $studentClass,
            "dataAyah"       => $dataAyah,
            "dataIbu"        => $dataIbu,
            "dataWali"       => $dataWali
        ], "Edit Siswa", "dashboard");
    }

    public function delete($nis)
    {
        $db = Database::getInstance();
        $studentModel = new Student($db);
        $studentModel->delete($nis);
        Flasher::setFlash("Berhasil menghapus data", "success");
        header("Location: " . BASE_URL . "/students");
    }
}
