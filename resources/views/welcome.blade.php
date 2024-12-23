@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Добро пожаловать!</h1>
        <p class="lead">Это домашняя страница проекта для управления студентами и группами.</p>
        <hr class="my-4">
        <p>Начните работу с проектом, посетив список групп или создав новую группу.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('groups.index') }}" role="button">Список групп</a>
        <a class="btn btn-success btn-lg" href="{{ route('groups.create') }}" role="button">Создать группу</a>
    </div>
@endsection
