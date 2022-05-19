<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('admin.inc.head')
    <body>

    <div class="general_container">
        <!-- Sidebar -->
        @include('admin.inc.navigation')
        <!-- End of Sidebar -->
        <!-- Content -->
        <div class="content_wrap">
            <div class="header">
                <h1>Архив страниц</h1>
            </div>
            <div class="content">
                <div class="inner">
                    <div class="action_bar">
                        <h2 class="title">Список страниц</h2>
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
                                <input type="submit" class="form-control" value="Опубликовать" />
                            </div>
                        </form>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Content -->
    </div>

    @include('admin.inc.footer')
    </body>
</html>