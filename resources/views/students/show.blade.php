@extends('layouts.app')

@section('title', $student->name)

@section('content')
    <h1>{{ $student->name }} {{ $student->surname }}</h1>
    <p>Фамилия: {{ $student->surname }}</p>
    <p>Имя: {{ $student->name }}</p>
    <a href="{{ route('groups.show', $group->id) }}" class="btn btn-secondary">Назад</a>
@endsection
