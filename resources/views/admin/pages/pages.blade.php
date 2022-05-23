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
    <div id="content" class="pages_archive">
        @if($pages_data)
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">№</th>
                    <th scope="col">Заголовок</th>
                    <th scope="col">Индексация</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Просмотров</th>
                    <th scope="col">Создано</th>
                    <th scope="col">Обновлено</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages_data as $page)
                        <tr>
                        <th scope="row">{{ $page->id }}</th>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->noindex }}</td>
                        <td>{{ $page->status }}</td>
                        <td>{{ $page->author }}</td>
                        <td>{{ $page->viewed }}</td>
                        <td>{{ $page->created_at }}</td>
                        <td>{{ $page->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Context Menu -->
            <div class="dropdown-menu dropdown-menu-sm" id="page_edit-context">
                <a class="dropdown-item edit" href="#">Редактировать</a>
                <a class="dropdown-item remove" href="#">Удалить</a>
            </div>
        @endif
    </div>
@endsection