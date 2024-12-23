@extends('layouts.app')

@section('title', 'Добавить студента')

@section('content')
    <h1>Добавить студента в группу "{{ $group->title }}"</h1> <!-- Здесь выводится имя группы -->

    <form action="{{ route('groups.students.store', $group->id) }}" method="POST">
        @csrf

        <!-- Поле для фамилии студента -->
        <div class="form-group">
            <label for="surname">Фамилия студента</label>
            <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}" required>
            @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Поле для имени студента -->
        <div class="form-group">
            <label for="name">Имя студента</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Добавить</button>
        <a href="{{ route('groups.show', $group->id) }}" class="btn btn-secondary">Назад</a>
    </form>
@endsection
