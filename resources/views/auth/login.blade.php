@extends('layout')

@section('style')
<style>

    .login-container form{
        width: 400px;
        margin:auto 100px;
    }

    .login-header{
        font-size: 25px;
        margin: 0 0px 10px 80px;
        font-weight: 700;
        border-bottom: 2px solid #FFDE00;
        width: 430px;
        text-align: center;
    }

    .login-container form input{
        margin-bottom: 20px;
    }

    .login-container label{
        font-weight: 700;
    }

    .login-container form button{
        background-color:#FFDE50;
        color:whitesmoke !important;
    }
    .login-container form button:hover{
        background-color:#FFDE00 !important;
    }

</style>
@endsection

@section('content')
<div class="container login-container pb-4">
    <div class="row justify-content-center">
        <div class="">
            <div class="login-header">{{ __('Login') }}</div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label for="email" class="">{{ __('Email Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="">
                    <label for="password" class="">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="">
                        <button type="submit" class="btn">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection