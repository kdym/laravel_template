@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
    <div class="login-box">
        <div class="login-logo">
            <b>Admin</b>LTE
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            @if(!\App\User::first())
                <div class="alert alert-info">
                    Nenhum usuário cadastrado, favor inserir o primeiro
                </div>

                {{ Form::open(['url' => route('users.store-first-user'), 'id' => 'first-user-form']) }}

                {{ Form::bsText('name', 'Nome') }}

                {{ Form::bsEmail('email', 'E-mail') }}

                {{ Form::bsPassword('password', 'Senha') }}

                {{ Form::bsPassword('confirm_password', 'Confirme a Senha') }}

                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-check"></i> Salvar</button>

                {{ Form::close() }}
            @else
                <form action="{{ url(config('adminlte.login_url', 'login')) }}" method="post">
                    {!! csrf_field() !!}

                    <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                               placeholder="E-mail">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input type="password" name="password" class="form-control"
                               placeholder="Senha">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember"> Lembrar de mim
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit"
                                    class="btn btn-primary btn-block btn-flat">Entrar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            @endif
        </div>
        <!-- /.login-box-body -->
    </div><!-- /.login-box -->
@stop

@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
    <script>
        $(function () {
            $('#first-user-form').validate({
                rules: {
                    'name': 'required',
                    'email': {
                        'required': true,
                        'email': true
                    },
                    'password': 'required',
                    'password_confirm': {
                        'required': function(element) {
                            return $('#password').val() != '';
                        },
                        'equalTo': '#password'
                    }
                },
                messages: {
                    'password_confirm': {
                        'equalTo': 'Deve ser igual à Senha'
                    }
                }
            });

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
    @yield('js')
@stop
