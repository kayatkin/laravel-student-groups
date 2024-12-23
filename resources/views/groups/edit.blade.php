@extends('layouts.app')

@section('title', 'Редактировать группу')

@section('content')
    <h1>Редактировать группу</h1>

    <form action="{{ route('groups.update', $group->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Название группы</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $group->title) }}" required>
        </div>

        <div class="form-group">
            <label for="start_from">Дата начала</label>
            <input type="date" class="form-control" id="start_from" name="start_from" 
                   value="{{ old('start_from', \Carbon\Carbon::parse($group->start_from)->format('Y-m-d')) }}" required>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ $group->is_active ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Активна</label>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
@endsection
