@extends('layout.master')
@section('title', 'Контакты')
@section('content')
    <div class="contacts">
        <h1>Контакты</h1>
        <form method="post" action="/contacts">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Сообщение</label>
                <textarea type="text" name="message" class="form-control" id="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
