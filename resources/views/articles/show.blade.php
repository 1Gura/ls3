@extends('layout.master')
@section('title', 'Статья')
@section('content')
    <div class="article-item">
        <h1>{{$article->title}}</h1>
        <p>Дата публикации: {{$article->created_at->format('d.m.Y')}}</p>
        <p>{{$article->description}}</p>
        <p>{{$article->body}}</p>
        @include('articles.tags', ['tags'=>$article->tags])
        <a href="{{route('articles.index')}}">Вернуться</a>
    </div>
@endsection
