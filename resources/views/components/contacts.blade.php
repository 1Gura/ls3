@extends('layout.master')
@section('content')
<div class="contacts">
    <h1>Контакты</h1>
    <form method="post" action="">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Сообщение</label>
            <input type="text" name="message" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
@endsection
