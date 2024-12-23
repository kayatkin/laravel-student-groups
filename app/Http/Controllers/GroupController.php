<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    // 1. Отображает список всех групп
    public function index()
    {
        // Получаем все группы из базы данных
        $groups = Group::all();
        
        // Возвращаем представление с данными групп
        return view('groups.index', compact('groups'));
    }

    // 2. Отображает страницу для создания новой группы
    public function create()
    {
        // Отображаем форму для создания новой группы
        return view('groups.create');
    }

    // 3. Создаёт новую группу
    public function store(Request $request)
    {
        // Валидируем данные, полученные от пользователя
        $validated = $request->validate([
            'title' => 'required|string|max:255',  // Название группы
            'start_from' => 'required|date',       // Дата начала обучения
            'is_active' => 'nullable|boolean',     // Статус активности группы (nullable если не установлен чекбокс)
        ]);

        // Проверяем, если поле is_active не передано, то присваиваем false
        $isActive = $request->has('is_active') ? true : false;

        // Создаём новую группу с валидированными данными
        Group::create([
            'title' => $validated['title'],
            'start_from' => $validated['start_from'],
            'is_active' => $isActive,
        ]);

        // Перенаправляем на список групп с сообщением об успешном создании
        return redirect()->route('groups.index')->with('success', 'Группа успешно создана!');
    }

    // 4. Отображает информацию по выбранной группе и список студентов
    public function show(Group $group)
    {
        // Получаем список студентов для выбранной группы
        $students = $group->students;
        
        // Возвращаем представление с данными группы и студентов
        return view('groups.show', compact('group', 'students'));
    }

    // 5. Отображает страницу для добавления студента в группу
    public function createStudent(Group $group)
    {
        // Отображаем форму для добавления нового студента в группу
        return view('students.create', compact('group'));
    }

    // 6. Создаёт студента для группы
    public function storeStudent(Request $request, Group $group)
{
    // Валидируем данные для студента
    $validated = $request->validate([
        'surname' => 'required|string|max:255',  // Фамилия студента
        'name' => 'required|string|max:255',     // Имя студента
    ]);

    // Добавляем студента в группу
    $group->students()->create($validated);

    // Перенаправляем на страницу группы с сообщением об успешном добавлении студента
    return redirect()->route('groups.show', $group)->with('success', 'Студент успешно добавлен!');
}


    // 7. Отображает информацию о студенте
    public function showStudent(Group $group, Student $student)
    {
        // Отображаем информацию о студенте в группе
        return view('students.show', compact('group', 'student'));
    }
}
