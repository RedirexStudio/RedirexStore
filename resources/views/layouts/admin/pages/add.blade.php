@extends('layouts.admin.index')

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
            <button type="button" onclick="event.preventDefault();$('#content>form#page_form').submit();" class="btn btn-success add_page"><i class="bi bi-save"></i></button>
        </div>
    </div>
    <div id="content">
        <form action="{{ route('add-page-request') }}" id="page_form" method="post">
            @csrf
            <div class="mb-3 title-form_wrap">
                <label for="title" class="form-label">Название страницы</label>
                <input type="text" id="title" name="page_title" value="{{ old('page_title') }}" class="form-control" placeholder="Введите название страницы" />
                <div class="url_popover"><input type="text" name="page_url" value="{{ old('page_url') }}" class="form-control" placeholder="url страницы" /></div>
            </div>
            <div class="mb-3">
                <label for="page_content" class="form-label">Содержимое страницы</label>
                <textarea name="page_content" id="page_content" class="form-control" cols="30" rows="10">{{ old('page_content') }}</textarea>
            </div>
            <div>
                <input type="submit" class="form-control" value="Опубликовать" hidden />
                <label for="title" aclass="form-label">Шаблон страницы</label>
                <select name="page_template">
                    <option disabled>Выбрать шаблон</option>
                    @foreach( $page_templates as $templates )
                        <option value="{{ $templates->id }}">{{ $templates->path }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>
@endsection