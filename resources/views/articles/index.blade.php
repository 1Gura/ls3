@extends('layout.master')
@section('content')
    <div class="main-content">
        @if(session()->has('flash_message'))
            <div class="alert alert-success">
                {{session('flash_message')}}
            </div>
        @endif
        <h1>Список статей</h1>
        <ul class="list-articles">
            @foreach ($articles as $article)
                @include('articles.item')
            @endforeach
        </ul>
    </div>
@endsection
