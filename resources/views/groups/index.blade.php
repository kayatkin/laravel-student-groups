@extends('layouts.app')

@section('title', 'Список групп')

@section('content')
    <h1>Список групп</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Название группы</th>
                <th>Дата начала</th>
                <th>Активна</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($groups as $group)
                <tr>
                    <td>{{ $group->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($group->start_from)->format('d.m.Y') }}</td>
                    <td>
                        @if($group->is_active)
                            <span class="badge bg-success">Активна</span>
                        @else
                            <span class="badge bg-secondary">Неактивна</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('groups.show', $group) }}" class="btn btn-info btn-sm">Подробнее</a>
                        <a href="{{ route('groups.edit', $group) }}" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="{{ route('groups.destroy', $group) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
