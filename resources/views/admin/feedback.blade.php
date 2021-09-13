@extends('layout.master')
@section('title', 'Обратная связь')
@section('content')
    <div class="feedback">
        <h3>Обратная связь</h3>
        <div class="list-feedback">
            <ul>
            </ul>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Номер</th>
                    <th scope="col">email</th>
                    <th scope="col">Сообщение</th>
                    <th scope="col">Дата публикации</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($feedbackList as $key=>$item)
                <tr>
                    <th scope="row">{{($key + 1)}}</th>
                    <td>{{$item->email}}</td>
                    <td>{{$item->message}}</td>
                    <td>{{$item->created_at->format('d.m.Y')}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
