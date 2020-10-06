@extends('layouts.app')

@section('title')
    SIGN IN
@endsection
@section('content')
<div class="container">
    <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
            <span class="label-input100">{{ __('Usuario') }}</span>
            <input class="input100 @error('username') is-invalid @enderror" type="text" id="username" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Ingrese usuario">
            <span class="focus-input100"></span>
            @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-26" data-validate="Name is required">
            <span class="label-input100">{{ __('Nombre(s)') }}</span>
            <input class="input100 @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Ingrese nombre(s)">
            <span class="focus-input100"></span>
            @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-26" data-validate="Last name is required">
            <span class="label-input100">{{ __('Apellido(s)') }}</span>
            <input class="input100 @error('last_name') is-invalid @enderror" type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Ingrese apellido(s)">
            <span class="focus-input100"></span>
            @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-26" data-validate="Address is required">
            <span class="label-input100">{{ __('Dirección') }}</span>
            <input class="input100 @error('address') is-invalid @enderror" type="text" id="address" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Ingrese dirección">
            <span class="focus-input100"></span>
            @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-26" data-validate="Career is required">
            <span class="label-input100">{{ __('Profesión') }}</span>
            <input class="input100 @error('career') is-invalid @enderror" type="text" id="career" name="career" value="{{ old('career') }}" required autocomplete="career" placeholder="Ingrese profesión">
            <span class="focus-input100"></span>
            @error('career')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-26" data-validate="Facebook is required">
            <span class="label-input100">{{ __('Facebook') }}</span>
            <input class="input100 @error('facebook') is-invalid @enderror" type="text" id="facebook" name="facebook" value="{{ old('facebook') }}" required autocomplete="facebook" placeholder="Ingrese facebook">
            <span class="focus-input100"></span>
            @error('facebook')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-26" data-validate="Facebook is required">
            <span class="label-input100">{{ __('Correo Electronico') }}</span>
            <input class="input100 @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Ingrese correo electronico">
            <span class="focus-input100"></span>
            @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
            <span class="label-input100">{{ __('Contraseña') }}</span>
            <input class="input100 @error('password') is-invalid @enderror" type="password" id="password" name="password" required autocomplete="new-password" placeholder="Ingrese contraseña">
            <span class="focus-input100"></span>
            @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="wrap-input100 validate-input m-b-18" data-validate = "Confirm password is required">
            <span class="label-input100">{{ __('Confirmar Contraseña') }}</span>
            <input class="input100 @error('password') is-invalid @enderror" id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ingrese nuevamente contraseña">
            <span class="focus-input100"></span>
            @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="container-login100-form-btn">
            <button type="submit" class="login100-form-btn">
                {{ __('Registrar') }}
            </button>
        </div>
        
    </form>
</div>
@endsection
