@extends('layout.master')
@section('title', 'Админка')
@section('content')
    <div class="admin">
        <h3>Админка</h3>
    </div>
    <a href="{{route('feedback')}}">Пеерейти в пункт "Обратная связь"</a>
@endsection
