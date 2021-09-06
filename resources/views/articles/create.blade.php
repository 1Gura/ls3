@extends('layout.master')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Создание задачи
        </h3>
        @include('errors')
        <form method="post" action="/articles">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Название задачи</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                       placeholder="Введите название задачи">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Описание задачи</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="body" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
