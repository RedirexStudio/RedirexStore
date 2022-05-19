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
                <h1>Главная панель</h1>
            </div>
            <div class="content">
                <div class="inner">
                    Содержимое
                </div>
            </div>
        </div>
        <!-- End of Content -->
    </div>

    @include('admin.inc.footer')
    </body>
</html>