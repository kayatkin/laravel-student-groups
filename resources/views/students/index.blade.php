@extends('layouts.app')

@section('title', 'Список студентов')

@section('content')
    <h1>Список студентов</h1>

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Группа</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->surname }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->group->title ?? 'Без группы' }}</td> <!-- Используем отношение group -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('groups.create') }}" class="btn btn-primary">Добавить нового студента</a>
@endsection
