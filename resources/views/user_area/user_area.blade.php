<ul class="nav navbar-nav">
    <li>
        <a href="{{ route('users.profile') }}">{{ Auth::user()->name }}</a>
    </li>
    <li>
        @if(config('adminlte.logout_method') == 'GET' || !config('adminlte.logout_method') && version_compare(\Illuminate\Foundation\Application::VERSION, '5.3.0', '<'))
            <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}">
                <i class="fa fa-fw fa-power-off"></i> Sair
            </a>
        @else
            <a href="#"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            >
                <i class="fa fa-fw fa-power-off"></i> Sair
            </a>
            <form id="logout-form"
                  action="{{ url(config('adminlte.logout_url', 'auth/logout')) }}"
                  method="POST" style="display: none;">
                @if(config('adminlte.logout_method'))
                    {{ method_field(config('adminlte.logout_method')) }}
                @endif
                {{ csrf_field() }}
            </form>
        @endif
    </li>
</ul>