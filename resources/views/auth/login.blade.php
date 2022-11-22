@extends('layouts.app')

@section('content')
<div class="login">
    <div class="login-form">
        <div class="login-header">
            <div class="login-head-img">
                <img src="/assets/images/logo.png" width="100px" height="100%" alt="">
            </div>
            <h4>{{ __('Sign In') }}</h4>
        </div>
        <div class="flex">
            <div class="login-body mt-3">
                <form class="form" action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="div-input">
                        <input class="input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus type="email" id="email" name="email" placeholder="Email" >
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input class="input form-control @error('password') is-invalid @enderror" type="password" required autocomplete="current-password" id="password" name="password" placeholder="Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="">
                        <div class="login-check">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                                
                            </div>
                            <div class="fp">
                                @if(Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">{{ __('Forgot Password?') }}</a>
                                @endif
                                
                            </div>
           
                        </div>
                    </div>
                    
                    <div class="">
                        <button type="submit" class="button">LOG IN</button>
                    </div>
                </form>
                <div class="footer">
                    <div class="footer-a">

                    </div>
                    <div class="footer-b">
                        <span class="footer-text">Don't have an account? </span>
                        <a href="{{ route('register') }}" class="footer-link">{{__('Sign up')}}</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<br>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                    
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                    @endif
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
