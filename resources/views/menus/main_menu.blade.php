@php
    $routeArray = app('request')->route()->getAction();
    $controllerAction = class_basename($routeArray['controller']);
    list($controller, $action) = explode('@', $controllerAction);
@endphp

<li class="header">Menu</li>

@php
    $class = '';

    if ($controller == 'HomeController') {
        $class = 'active';
    }
@endphp

<li class="{{ $class }}">
    <a href="{!! route('home') !!}">
        <i class="fa fa-tachometer"></i> <span>Dashboard</span>
    </a>
</li>

@php
    $class = '';
    $display = 'none';

    if ($controller == 'UsersController') {
        $class = 'menu-open';
        $display = 'block';
    }
@endphp


<li class="treeview {{ $class }}">
    <a href="#">
        <i class="fa fa-cog"></i> <span>Configurações</span>

        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>

    <ul class="treeview-menu" style="display: {{ $display }}">

        @php
            $class = '';

            if ($controller == 'UsersController' && $action == 'profile') {
                $class = 'active';
            }
        @endphp

        <li class="{{ $class }}"><a href="{!! route('users.profile') !!}"><i class="fa fa-user"></i> Perfil</a></li>
    </ul>
</li>