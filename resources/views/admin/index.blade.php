<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>@yield('darkside-title')</title>

            <!-- Bootstrap styles -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
            <!-- Darkside styles -->
            <link rel="stylesheet" href="{{asset('admin/css/darkside.css')}}">
    </head>
    <body>

    <div class="general_container">
        <!-- Sidebar -->
        @include('admin.inc.aside')
        <!-- End of Sidebar -->
        <!-- Content -->
        <div class="content_wrap">
            <div class="header">
                <!--
                * Uncomment code with "@" if you need dependecy of page url *
                    if( Request::is('/'))
                        Содержимое зависимое от url
                    endif
                -->
                <h1>@yield('darkside-page-title')</h1>
            </div>
            <div class="content">
                <div class="inner">
                    @yield('darkside-content')
                </div>
            </div>
        </div>
        <!-- End of Content -->
    </div>

        <!-- Jquery JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <!-- Admin JS -->
        <script src="{{asset('admin/js/darkside.js')}}"></script>
    </body>
</html>