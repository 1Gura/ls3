@extends('layout.master')
@section('title', 'Создание статьи')
@include('components.article-form', ['article'=>$article, 'method'=>'PATCH'])

