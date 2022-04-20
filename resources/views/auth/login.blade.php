@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
        <div class="login-logo">
            <center><img src="{{ asset('img/logo_idola.png') }}" class="img-fluid" width="500" alt=""></center>
        </div>
        <div class="card">

                <div class="card-body">
                <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-center">
                                <input id="username" type="input" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>*Incorrect Username or Password.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                        

                            <div class="col-md-center">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>*Incorrect Username or Password.</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-center"></div>
                            <div class="col-md-center">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block">
                                    <strong>Captcha is Required.</strong>
                                </span>
                                @endif
                            </div>
                        </div>                        
                        <div class="row mb-0">
                            <div class="col-md-center">
                                <button type="submit" class="btn btn-main btn-block">
                                    {{ __('Masuk') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
                    
            </div>
        </div>
    </div>
</div>
@endsection