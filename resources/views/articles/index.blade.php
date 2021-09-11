@extends('layout.master')
@section('title')

    Главная
@endsection
@section('content')
    <div class="list-task">
        <h3>Список задач</h3>
        @foreach ($tasks as $task)
            @include('tasks.item')
        @endforeach
    </div>
@endsection
