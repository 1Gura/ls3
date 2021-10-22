@extends('layout.master')
@section('title', 'Создание статьи')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Изменение задачи
        </h3>
        @include('errors')
        @if(!empty($_GET['codeError']))
            <div class="alert-danger">Статья с таким кодом уже есть</div>
        @endif
        <form method="POST" action="{{route('articles.update', $article)}}">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="title" class="form-label">Название статьи</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    id="title"
                    value="{{ old('title', $article->title) }}"
                    placeholder="Введите название задачи">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Краткое описание</label>
                <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    rows="3"
                >{{old('description', $article->description)}}</textarea>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Описание задачи</label>
                <textarea
                    class="form-control"
                    id="body"
                    name="body"
                    rows="3"
                >{{old('body', $article->body)}}</textarea>
            </div>
            <div class="mb-3">
                <label for="completed" class="form-label">Опубликовано</label>
                <input
                    type="checkbox"
                    id="completed"
                    name="completed"
                    @if($article->completed == 1)
                    checked
                    @endif
                >
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
