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
                            <a href="/darkside/pages/add" class="btn btn-success add_page"><i class="bi bi-plus"></i></a>
                            <button type="button" class="btn btn-outline-warning add_page"><i class="bi bi-pause"></i></button>
                            <button type="button" class="btn btn-outline-danger add_page"><i class="bi bi-dash"></i></button>
                        </div>
                    </div>
                    <div id="content">Загрузка...</div>
                </div>
            </div>
        </div>
        <!-- End of Content -->
    </div>

    @include('admin.inc.footer')
    </body>
</html>