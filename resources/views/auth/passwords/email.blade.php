@extends('layouts.app')

@section('content')

        <p class="login-box-msg">{{ __('Reset Password') }}</p>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="input-group row mb-3">
                
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
            </div>

            <div class="form-group row mb-2 justify-content-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
            <div class="form-group row mb-0 justify-content-center">
                <a href="{{ route('login') }}">Login Page</a>
            </div>
        </form>
                
@endsection
