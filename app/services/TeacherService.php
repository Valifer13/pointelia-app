<?php 

class TeacherService {
    private Teacher $teacherModel;
    private Role $roleModel;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $this->teacherModel = new Teacher($db);
        $this->roleModel    = new Role($db);
    }

    public function getAllTeachers(): array
    {
        $teachers = $this->teacherModel->getAllTeachersWithRole();

        return [
            'teachers' => $teachers
        ];
    }

    public function getDetailTeacher(string $code): array
    {
        $teacher = $this->teacherModel->getTeacherByCode($code);

        if (empty($teacher)) {
            throw new Exception("Data guru tidak ditemukan!");
        }

        return [
            'teacher' => $teacher
        ];
    }

    public function createTeacherData(array $data): void
    {
        $role     = $this->roleModel->getRoleByName($data['access']);
        $password = password_hash('user@123', PASSWORD_DEFAULT);

        $this->teacherModel->create(
            $data['code'],
            (int) $role['id'],
            $data['fullname'],
            $data['username'],
            $password,
            $data['email'],
            $data['phone_number'],
            $data['position'],
            (int) $data['status']
        );
    }

    public function getEditTeacherFormData(string $code): array
    {
        $teacher = $this->teacherModel->getTeacherByCode($code);
        $role    = $this->roleModel->getRoleById($teacher['role_id']);

        if (empty($teacher)) {
            throw new Exception("Guru dengan id $code tidak ditemukan.");
        }

        return [
            'teacher' => $teacher,
            'role'    => $role
        ];
    }

    public function updateTeacher(array $data): void
    {
        $role = $this->roleModel->getRoleByName($data['access']);

        $this->teacherModel->update(
            $data['code'],
            (int) $role['id'],
            $data['fullname'],
            $data['username'],
            $data['email'],
            $data['phone_number'],
            $data['position'],
            (int) $data['status']
        );
    }

    public function deleteTeacher(string $code): void
    {
        $teacher = $this->teacherModel->getTeacherByCode($code);

        if (empty($teacher)) {
            throw new Exception("Guru dengan kode $code tidak ditemukan.");
        }
        
        $this->teacherModel->delete($code);
    }
}