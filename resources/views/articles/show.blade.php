@extends('layout.master')
@section('title', 'Статья')
@section('content')
    <div class="article-item">
        <h1>{{$article->title}}</h1>
        <p>Дата публикации: {{$article->created_at->format('d.m.Y')}}</p>
        <p>{{$article->description}}</p>
        <p>{{$article->body}}</p>
        @if($article->steps->isNotEmpty())
            <ul class="list-group">
                @foreach($article->steps as $step)
                    <form action="{{route('steps.update', $step)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-check">
                            <label class="form-check-label {{$step->completed ? 'alert-success' : ''}}">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    name="completed"
                                    onclick="this.form.submit()"
                                    {{$step->completed ? 'checked' : ''}}
                                >
                                {{$step->description}}
                            </label>
                        </div>
                    </form>
                @endforeach
            </ul>
        @endif
        <form class="card card-body mb-4" action="{{route('steps.store')}}" method="POST">
            @csrf
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <div class="form-group">
                <label>
                    <input
                        placeholder="Шаг"
                        type="text"
                        class="form-control"
                        value="{{old('description')}}"
                        name="description"/>
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Добавить шаг</button>
        </form>
        <a href="{{route('articles.index')}}">Вернуться</a>
    </div>
@endsection
