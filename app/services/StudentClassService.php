<?php 

class StudentClassService
{
    private StudentClass $studentClassModel;
    private Major $majorModel;
    private Teacher $teacherModel;
    private GradeLevel $gradeLevelModel;
    private $db;

    public function __construct($db)
    {
        $this->db                = $db;
        $this->studentClassModel = new StudentClass($db);
        $this->majorModel        = new Major($db);
        $this->teacherModel      = new Teacher($db);
        $this->gradeLevelModel   = new GradeLevel($db);
    }

    public function getAllStudentClasses(int $page)
    {
        $student_classes = $this->studentClassModel->getAllStudentClassesWithTeachers($page);

        return [
            'student_classes' => $student_classes,
        ];
    }

    public function getDetailStudentClass($id)
    {
        $student_class = $this->studentClassModel->getStudentClassById($id);

        if (empty($student_class)) {
            throw new Exception("Data kelas tidak ditemukan");
        }

        $students_in_this_class = $this->studentClassModel->getAllStudentInClass($id);

        return [
            'student_class' => $student_class,
            'students_in_this_class' => $students_in_this_class
        ];
    }

    public function getCreateStudentClassFormData()
    {
        $majors = $this->majorModel->getAllMajors();
        $bk_teachers = $this->teacherModel->getTeacherByRole("Bimbingan Konseling");
        $form_tutors = $this->teacherModel->getTeacherByRole("Guru");

        return [
            'majors' => $majors,
            'bk_teachers' => $bk_teachers,
            'form_tutors' => $form_tutors
        ];
    }

    public function createStudentClass($data)
    {
        $major       = $this->majorModel->getMajorByName($data['major']);
        $grade       = $this->gradeLevelModel->getGradeLevelByName($data['grade_class']);
        $form_tutor  = $this->teacherModel->getTeacherByCode($data['form_tutor']);
        $bk_teacher  = $this->teacherModel->getTeacherByCode($data['bk_teacher']);
        $last_class  = $this->studentClassModel->getStudentClassByGradeAndMajor($grade['grade'], $major['name']);
        $last_rombel = 1;

        if (empty($major['id'])) {
            throw new Exception("Jurusan tidak ditemukan.");
        }

        if (empty($grade['id'])) {
            throw new Exception("Tingkat kelas tidak ditemukan.");
        }

        if (empty($form_tutor)) {
            throw new Exception("Data guru wali tidak ditemukan.");
        }

        if (empty($bk_teacher)) {
            throw new Exception("Data guru BK tidak ditemukan.");
        }

        if (empty($last_class['rombel'])) {
            $last_rombel = 1;
        } else {
            $last_rombel++;
        }

        $this->studentClassModel->create(
            $major['id'],
            $grade['id'],
            $form_tutor['code'],
            $bk_teacher['code'],
            $last_rombel
        );
    }

    public function getEditStudentClassFormData($id)
    {
        $student_class = $this->studentClassModel->getStudentClassById($id);
        $majors = $this->majorModel->getAllMajors();
        $bk_teachers = $this->teacherModel->getTeacherByRole("Bimbingan Konseling");
        $form_tutors = $this->teacherModel->getTeacherByRole("Guru");

        if (empty($student_class)) {
            throw new Exception("Data kelas tidak ditemukan");
        }

        return [
            'student_class' => $student_class,
            'majors' => $majors,
            'bk_teachers' => $bk_teachers,
            'form_tutors' => $form_tutors
        ];
    }

    public function editStudentClass($data)
    {
        $student_class = $this->studentClassModel->getStudentClassById($data['id']);
        $major       = $this->majorModel->getMajorByName($data['major']);
        $grade       = $this->gradeLevelModel->getGradeLevelByName($data['grade_class']);
        $form_tutor  = $this->teacherModel->getTeacherByCode($data['form_tutor']);
        $bk_teacher  = $this->teacherModel->getTeacherByCode($data['bk_teacher']);

        if (empty($student_class)) {
            throw new Exception("Data kelas tidak ditemukan");
        }

        if (empty($major['id'])) {
            throw new Exception("Jurusan tidak ditemukan.");
        }

        if (empty($grade['id'])) {
            throw new Exception("Tingkat kelas tidak ditemukan.");
        }

        if (empty($form_tutor)) {
            throw new Exception("Data guru wali tidak ditemukan.");
        }

        if (empty($bk_teacher)) {
            throw new Exception("Data guru BK tidak ditemukan.");
        }

        $this->studentClassModel->update(
            $data['id'],
            $major['id'],
            $grade['id'],
            $form_tutor['code'],
            $bk_teacher['code'],
            $data['rombel']
        );
    }

    public function deleteStudentClass($id)
    {
        $student_class = $this->studentClassModel->getStudentClassById($id);

        if (empty($student_class)) {
            throw new Exception("Data kelas tidak ditemukan");
        }

        $this->studentClassModel->delete($id);
    }
}