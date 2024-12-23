<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        // Получаем всех студентов с данными групп
        $students = Student::with('group')->get();

        // Возвращаем представление со списком студентов
        return view('students.index', compact('students'));
    }
}
