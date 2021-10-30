@extends('layout.master')
@section('title', 'Создание статьи')
<x-article-form :method="'POST" :article = "null"/>
