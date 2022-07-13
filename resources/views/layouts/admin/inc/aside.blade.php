@section('darkside-aside')
    <nav class="sidebar">
        <div class="logo"><span><span>redirex</span> <span>store</span></span></div>
        <div class="login_cart"><span>Вы вошли как: </span><span>{{ Auth::user()->name }}</span> <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> ({{ __('logout') }})</a></div>
        <ul>
            <li><a href="{{ route('darkside') }}" class="btn">Панель</a></li>
            <li><a href="{{ route('darkside-pages') }}" class="btn">Страницы</a></li>
            @show
        </ul>
    </nav>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>