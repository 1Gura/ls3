@extends('layout.master')
@section('content')
    <div class="main-content">
        <h1>Список статей</h1>
    <ul class="list-articles">
        @foreach ($articles as $article)
            @include('articles.item')
        @endforeach
    </ul>
    </div>
@endsection
