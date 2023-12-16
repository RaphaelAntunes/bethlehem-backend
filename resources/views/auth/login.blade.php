@extends('layouts.app', [
    'class' => 'login-page',
])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-lg-4 col-md-8 ml-auto mr-auto">
                    <div class="card card-login">
                        <div class="card-header ">
                            <div class="card-header d-flex flex-column justify-content-center align-items-center ">
                                <img src="/paper/img/logo-ib.png" alt="">
                                <h3 class="header text-center mt-3">{{ __('Sistema IBB') }}</h3>
                            </div>
                        </div>
                        <div class="card-body" style="min-height: 100px;">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i style="font-size:18px;" class="nc-icon nc-single-02"></i>
                                    </span>
                                </div>
                                <input style="padding:20px;" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('E-mail') }}" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                                
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i style="font-size:18px;" class="nc-icon nc-lock-circle-open"></i>
                                    </span>
                                </div>
                                <input style="padding:20px;" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="{{ __('Senha') }}" type="password" required>
                                
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                     <label class="form-check-label">
                                        <input class="form-check-input" name="remember" type="checkbox" value="" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="form-check-sign"></span>
                                        {{ __('Lembrar o acesso') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center">
                                <button style="width: 100%;max-width: 138px;height: 100%;min-height: 39px;font-size: 15px;" type="submit" onclick="doLogin()" class="btn btn-warning btn-round mb-3">{{ __('Entrar') }}</button>
                            </div>
                        </div>
                    </div>
            
            </div>
        </div>
    </div>
@endsection


<script>
    function doLogin() {
        // Obtenha os valores do formulário
        var email = $('#email').val();
        var password = $('#password').val();

        // Crie um objeto com as credenciais
        var credentials = {
            email: email,
            password: password
        };

        // Faça a solicitação AJAX
        $.ajax({
            type: 'POST',
            url: '/api/login', 
            contentType: 'application/json',
            data: JSON.stringify(credentials),
            success: function (response) {
                var token = response.access_token;
                localStorage.setItem('token', token);
                if(token){
                    window.location.href = '/user';
                }
            },
            error: function (error) {
                console.error('Erro ao fazer login:', error.responseText);
            }
        });
    }
</script>