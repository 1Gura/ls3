@extends('layout.master')
@section('title')
    Создание статьи
@endsection
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Создание задачи
        </h3>
        @include('errors')
        <form method="post" action="/articles">
            @csrf
            <div class="mb-3">
                <label for="symbol" class="form-label">Уникальный символьный код</label>
                <input type="text" name="symbol_code" class="form-control" id="symbol"
                       placeholder="Введите код">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Название статьи</label>
                <input type="text" name="title" class="form-control" id="title"
                       placeholder="Введите название задачи">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Краткое описание</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Описание задачи</label>
                <textarea class="form-control" id="body" name="body" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="completed" class="form-label">Опубликовано</label>
                <input type="checkbox" id="completed" name="completed">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
