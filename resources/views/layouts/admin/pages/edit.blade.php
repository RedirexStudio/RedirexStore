@extends('layouts.admin.index')

@section('darkside-title', 'DarkSide - Редактирование страницы')

@section('darkside-page-title', 'Редактирование страницы')

@section('darkside-content')
    <div class="action_bar">
        <h2 class="title">Редактирование</h2>
        <div class="buttons">
            <a href="#" onclick="event.preventDefault();$('#content>form#page_form').submit();" class="btn btn-success add_page"><i class="bi bi-save"></i></a>
            <button type="button" class="btn btn-outline-warning add_page"><i class="bi bi-pause"></i></button>
            <a href="{{ route('delete-page-request', $page_data->id) }}" class="btn btn-outline-danger add_page"><i class="bi bi-dash"></i></a>
        </div>
    </div>
    <div id="content">
        <form action="{{ route('update-page-request', $page_data->id) }}" id="page_form" method="post">
            @csrf
            <div class="input-group input-group-sm mb-3 title-form_wrap">
                <label for="title" class="input-group-text">Название страницы</label>
                <input type="text" id="title" name="page_title" class="form-control" value="{{ $page_data->title }}" placeholder="Введите название страницы" />
                <div class="url_popover"><input type="text" name="page_url" class="form-control" value="{{ $routings->url }}" placeholder="url страницы" /></div>
            </div>
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text">Родительская страница</span>
                <div class="search_page_box"><select name="relative_page"><option>Без родителя</option>@if($relation)<option value="{{ $relation['id'] }}" selected>{{ $relation['title'] }}</option>@endif</select></div>
            </div>
            <div class="mb-3">
                <label for="page_content" class="form-label">Содержимое страницы</label>
                <textarea name="page_content" id="page_content" class="form-control" cols="30" rows="10">{{ $page_data->content }}</textarea>
            </div>
            <div class="mb-3" hidden>
                <input type="submit" class="form-control" value="Обновить" />
            </div>
        </form>
        <form action="{{ route('pages-output-request', $page_data->id) }}" id="search_pages" method="post">@csrf <input type="hidden" class="form-control" name="parent_page"></form>
    </div>
@endsection