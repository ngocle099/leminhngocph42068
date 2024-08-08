<?php

namespace App\Controllers;

use App\Models\Student;

class StudentController extends BaseController
{
    protected $students;

    public function __construct()
    {
        $this->students = new Student();
    }

    public function index()
    {
        $students = $this->students->getListStudent();
        return $this->render('student.list', compact('students'));
    }

    public function create()
    {
        return $this->render('student.create');
    }

    public function store()
    {
        if (isset($_POST['btn-submit'])) {
            // Xác thực đầu vào
            $errors = [];

            if (empty($_POST['name'])) {
                $errors[] = "Bạn phải nhập tên";
            }

            if (empty($_POST['phone_number'])) {
                $errors[] = "Bạn phải nhập số điện thoại";
            }

            if (empty($_POST['year_of_birth'])) {
                $errors[] = "Bạn phải nhập năm sinh";
            }

            if (count($errors)) {
                $this->redirect('errors', $errors, 'create');
            } else {
                $check = $this->students->insertStudent(null, $_POST['name'], $_POST['year_of_birth'], $_POST['phone_number']);
                if ($check) {
                    $this->redirect('success', 'Thêm thành công', 'index');
                } else {
                    $this->redirect('errors', 'Thêm thất bại', 'create');
                }
            }
        }
    }

    public function delete($id)
    {
        $check = $this->students->deleteStudent($id);
        if ($check) {
            $this->redirect('success', 'Xóa thành công', 'index');
        } else {
            $this->redirect('errors', 'Xóa thất bại', 'index');
        }
    }

    private function redirect($type, $message, $route)
    {
        $_SESSION[$type] = $message;
        header("Location: /$route");
        exit();
    }
}
