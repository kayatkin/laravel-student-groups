@extends('layouts.app')

@section('title', 'Список групп')

@section('content')
    <h1>Список групп</h1>
    
    <!-- Уведомление об успешном создании группы -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <ul class="list-group">
        @foreach($groups as $group)
            <li class="list-group-item">
                <a href="{{ route('groups.show', $group->id) }}">{{ $group->title }}</a>
            </li>
        @endforeach
    </ul>
    
    <a href="{{ route('groups.create') }}" class="btn btn-primary mt-3">Создать группу</a>
@endsection
