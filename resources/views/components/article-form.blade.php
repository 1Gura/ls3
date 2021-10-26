@extends('layout.master')
@section('content')
    <div class="col-md-8 blog-main">
        <h3 class="pb-3 mb-4 font-italic border-bottom">
            Создание задачи
        </h3>
        @include('errors')
        @if(!empty($_GET['codeError']))
            <div class="alert-danger">Статья с таким кодом уже есть</div>
        @endif
        <form method="post" action="{{route('articles.store')}}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Название статьи</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    id="title"
                    value="{{old('title')}}"
                    placeholder="Введите название задачи">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Краткое описание</label>
                <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    rows="3"
                    value="{{old('description')}}"
                ></textarea>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Описание задачи</label>
                <textarea
                    class="form-control"
                    id="body"
                    name="body"
                    rows="3"
                    value="{{old('body')}}"
                ></textarea>
            </div>
            <div class="mb-3">
                <label for="completed" class="form-label">Опубликовано</label>
                <input
                    type="checkbox"
                    id="completed"
                    name="completed"
                    @if(old('completed') === 'on')
                    checked
                    @endif
                >
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection
