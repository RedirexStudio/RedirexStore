@extends('admin.index')

@section('darkside-title', 'DarkSide - Добавление страницы')

@section('darkside-page-title', 'Добавление страницы')

<!--
* Uncomment this if you want to append aside list *
section('darkside-aside')
    parent
    <li><a href="{{ route('darkside-pages') }}" class="btn">Доп ссылка</a></li>
endsection
-->

@section('darkside-content')
    <div class="action_bar">
        <h2 class="title">Новая страница</h2>
        <div class="buttons">
            <a href="{{ route('add-page') }}" class="btn btn-success add_page"><i class="bi bi-plus"></i></a>
            <button type="button" class="btn btn-outline-warning add_page"><i class="bi bi-pause"></i></button>
            <button type="button" class="btn btn-outline-danger add_page"><i class="bi bi-dash"></i></button>
        </div>
    </div>
    <div id="content">
        <form action="{{ route('add-page-request') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Название страницы</label>
                <input type="text" id="title" name="page_title" class="form-control" placeholder="Введите название страницы" />
            </div>
            <div class="mb-3">
                <label for="page_content" class="form-label">Содержимое страницы</label>
                <textarea name="page_content" id="page_content" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control" value="Опубликовать" />
            </div>
        </form>
    </div>
@endsection