@extends('layout')

@section('style')
<style>
    .reset-password form {
        width: 400px;
        margin: auto 100px;
    }

    .reset-header {
        font-size: 25px;
        margin: 0 0px 10px 80px;
        font-weight: 700;
        border-bottom: 2px solid #FFDE00;
        width: 430px;
        text-align: center;
    }

    .reset-password form input {
        margin-bottom: 20px;
    }

    .reset-password label {
        font-weight: 700;
    }

    .reset-password form button {
        background-color: #FFDE50;
        color: whitesmoke !important;
    }

    .reset-password form button:hover {
        background-color: #FFDE00 !important;
    }
</style>
@endsection


@section('content')
<div class="container reset-password">
    <div class="">
        <div class="">
            <div class="">
                <div class="reset-header">{{ __('Reset Password') }}</div>

                <div class="">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="">
                            <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="">
                            <label for="password-confirm" class="col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <button type="submit" class="btn">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection