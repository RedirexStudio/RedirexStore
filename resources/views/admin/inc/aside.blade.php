@section('darkside-aside')
    <nav class="sidebar">
        <div class="logo"><span><span>redirex</span> <span>store</span></span></div>
        <ul>
            <li><a href="{{ route('darkside') }}" class="btn">Панель</a></li>
            <li><a href="{{ route('darkside-pages') }}" class="btn">Страницы</a></li>
            @show
        </ul>
    </nav>