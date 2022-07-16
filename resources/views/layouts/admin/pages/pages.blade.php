@extends('layouts.admin.index')

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
    <div id="content" class="pages_archive">
        @if($pages_data)
            <div class="pages_list">
                <div class="header">
                    <ul>
                        <li>№</li>
                        <li>Заголовок</li>
                        <li>Индексация</li>
                        <li>Статус</li>
                        <li>Автор</li>
                        <li>Просмотров</li>
                        <li>Создано</li>
                        <li>Обновлено</li>
                    </ul>
                </div>

                <div class="body">
                    @foreach($pages_data as $page)
                        <div class="item" update_url="{{ route('edit-page', $page->page->id) }}" delete_url="{{ route('delete-page-request', $page->page->id) }}" open_url="">
                            <ul>
                                <li><input type="checkbox" name="selected_pages[]" class="selected_pages" /></li>
                                <li>{{ $page->page->id }}</th>
                                <li>{{ $page->page->title }}</li>
                                <li>{{ $page->page->noindex }}</li>
                                <li>{{ $page->page->status }}</li>
                                <li>{{ $page->page->author }}</li>
                                <li>{{ $page->page->viewed }}</li>
                                <li>{{ $page->page->created_at }}</li>
                                <li>{{ $page->page->updated_at }}</li>
                            </ul>

                        </div>
                                @foreach($page->childs as $childs)
                                <div class="subitem">
                                    <div class="item" update_url="{{ route('edit-page', $childs->id) }}" delete_url="{{ route('delete-page-request', $childs->id) }}" open_url="">
                                        <ul>
                                            <li><input type="checkbox" name="selected_pages[]" class="selected_pages" /></li>
                                            <li>{{ $childs->id }}</th>
                                            <li>- {{ $childs->title }}</li>
                                            <li>{{ $childs->noindex }}</li>
                                            <li>{{ $childs->status }}</li>
                                            <li>{{ $childs->author }}</li>
                                            <li>{{ $childs->viewed }}</li>
                                            <li>{{ $childs->created_at }}</li>
                                            <li>{{ $childs->updated_at }}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                    @endforeach
                </div>
            </div>

            <!-- Context Menu -->
            <div class="dropdown-menu dropdown-menu-sm" id="page_edit-context">
                <a class="dropdown-item open_page" target="_blank" href="#">Смотреть</a>
                <a class="dropdown-item edit" href="#">Редактировать</a>
                <a class="dropdown-item remove" href="#">Удалить</a>
            </div>
        @else
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>{{ __('Pages is not exist yet') }}</div>
            </div>
        @endif
    </div>
@endsection