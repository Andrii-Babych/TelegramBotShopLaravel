@extends('layouts.app')

@section('content')

    <section class="login_box_area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="login_form_inner">
                        <h3>Log in to enter</h3>

                        <form class="row login_form" method="POST" action="{{ route('login') }}" id="contactForm">
                            @csrf

                            <div class="col-md-12 form-group">

                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                       name="email"
                                       placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                                       autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-12 form-group">

                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       placeholder="Password"  required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-12 form-group">
                                <div class="creat_account">
                                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember">{{ __('Remember Me') }}</label>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="button button-login w-100">Log In</button>
{{--                                <a href="#">Forgot Password?</a>--}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
