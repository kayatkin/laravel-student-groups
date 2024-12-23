@extends('layouts.app')

@section('title', 'Создать группу')

@section('content')
    <h1>Создать новую группу</h1>
    <form action="{{ route('groups.store') }}" method="POST">
        @csrf

        <!-- Поле для названия группы -->
        <div class="form-group">
            <label for="title">Название группы</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Поле для даты начала обучения -->
        <div class="form-group">
            <label for="start_from">Дата начала обучения</label>
            <input type="date" name="start_from" id="start_from" class="form-control" value="{{ old('start_from') }}" required>
            @error('start_from')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Поле для статуса активности -->
        <div class="form-group">
            <label for="is_active">Статус активности</label>
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active') ? 'checked' : '' }}>
            <span>Группа активна</span>
            @error('is_active')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Создать</button>
        <a href="{{ route('groups.index') }}" class="btn btn-secondary">Назад</a>
    </form>
@endsection
