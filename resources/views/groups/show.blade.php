@extends('layouts.app')

@section('title', $group->title)

@section('content')
    <h1>{{ $group->title }}</h1>
    
    <!-- Отображение даты начала обучения -->
    <p><strong>Дата начала обучения:</strong> {{ $group->start_from }}</p>

    <!-- Отображение статуса активности -->
    <p><strong>Статус активности:</strong> {{ $group->is_active ? 'Активна' : 'Неактивна' }}</p>

    <!-- Отображение времени создания и обновления -->
    <p><strong>Дата создания:</strong> {{ $group->created_at }}</p>
    <p><strong>Дата обновления:</strong> {{ $group->updated_at }}</p>

    <h2>Студенты</h2>
    <ul class="list-group">
        @foreach($students as $student)
            <li class="list-group-item">
                <!-- Выводим фамилию и имя студента -->
                <a href="{{ route('groups.students.show', [$group->id, $student->id]) }}">
                    {{ $student->surname }} {{ $student->name }} <!-- Фамилия и имя -->
                </a>
            </li>
        @endforeach
    </ul>
    
    <a href="{{ route('groups.students.create', $group->id) }}" class="btn btn-primary mt-3">Добавить студента</a>
    <a href="{{ route('groups.index') }}" class="btn btn-secondary mt-3">Назад</a>
@endsection
