@extends('layout.master')
@section('title', 'Создание статьи')
@section('content')
    <x-article-form :method="'PATCH'" :article="$article"/>
@endsection

