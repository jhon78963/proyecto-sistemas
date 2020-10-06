@extends('layouts.app')

@section('title')
    LOGIN
@endsection

@section('content')
<div class="container">
    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">{{ __('Email o Usuario') }}</span>
            <input class="input100 @error('login') is-invalid @enderror" type="login" id="login" name="login" value="{{ old('login') }}" required autocomplete="login" autofocus placeholder="Ingrese usuario o email">
            <span class="focus-input100"></span>
            @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
            <span class="label-input100">{{ __('Contraseña') }}</span>
            <input class="input100 @error('password') is-invalid @enderror" type="password" id="password" name="password" required autocomplete="current-password" placeholder="Ingrese contraseña">
            <span class="focus-input100"></span>
            @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="flex-sb-m w-full p-b-30">
            <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="label-checkbox100" for="ckb1">
                    {{ __('Recuérdame') }}
                </label>
            </div>

            <div>
                <a href="{{ route('password.request') }}" class="txt1">
                    {{ __('¿Olvidó su contraseña?') }}
                </a>
            </div>
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                {{ __('Entrar') }}
            </button>
        </div>
    </form>
</div>
@endsection