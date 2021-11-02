@extends('layout.master')
@section('title', 'Создание статьи')
@section('content')
    <x-article-form :method="'POST'"/>
@endsection
