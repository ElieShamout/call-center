@extends('layout')

@section('style')
<style>
    .register-container form {
        width: 400px;
        margin: 20px 100px;
    }

    .register-header{
        font-size: 25px;
        margin: 0 0px 10px 80px;
        font-weight: 700;
        border-bottom: 2px solid #FFDE00;
        width: 430px;
        text-align: center;
    }

    .register-container form input {
        margin-bottom: 20px;
    }

    .register-container label {
        font-weight: 700;
    }

    .register-container form button {
        background-color: #FFDE50;
        color: whitesmoke !important;
    }

    .register-container form button:hover {
        background-color: #FFDE00 !important;
    }
</style>
@endsection

@section('content')
<div class="container register-container">
    <div class="">
        <div class="">
            <div class="register-header">{{ __('Register') }}</div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="">
                    <label for="first_name" class="col-form-label text-md-end">{{ __('First Name') }}</label>

                    <div class="">
                        <input id="first_name" type="text" class="form-control @error('first_namezzz') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                        @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <label for="middle_name" class="col-form-label text-md-end">{{ __('Center Name') }}</label>

                    <div class="">
                        <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middle_name" autofocus>

                        @error('middle_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <label for="last_name" class="col-form-label text-md-end">{{ __('Last Name') }}</label>

                    <div class="">
                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                        @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <label for="id_number" class="col-form-label text-md-end">{{ __('ID Number') }}</label>

                    <div class="">
                        <input id="id_number" type="text" class="form-control @error('id_number') is-invalid @enderror" name="id_number" value="{{ old('id_number') }}" required autocomplete="id_number">

                        @error('id_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <label for="phone" class="col-form-label text-md-end">{{ __('Phone') }}</label>

                    <div class="">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <label for="address" class="col-form-label text-md-end">{{ __('Address') }}</label>

                    <div class="">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="">
                    <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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

                <div class="row mb-0">
                    <div class="">
                        <button type="submit" class="btn">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection