@extends('admin.index')

@section('darkside-title')DarkSide - Архив страниц@endsection

@section('darkside-page-title')Архив страниц@endsection

@section('darkside-content')
    <div class="action_bar">
        <h2 class="title">Список страниц</h2>
        <div class="buttons">
            <a href="/darkside/pages/add" class="btn btn-success add_page"><i class="bi bi-plus"></i></a>
            <button type="button" class="btn btn-outline-warning add_page"><i class="bi bi-pause"></i></button>
            <button type="button" class="btn btn-outline-danger add_page"><i class="bi bi-dash"></i></button>
        </div>
    </div>
    <div id="content">Загрузка...</div>
@endsection