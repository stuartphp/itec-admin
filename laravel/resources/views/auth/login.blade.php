@extends('layouts.app')
@section('title', 'login page')
@section('content')
<div class="container-xl px-4">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
            <!-- Social login form-->
            <div class="card my-5">
                <div class="card-body p-5 text-center">
                    <div class="h3 fw-light mb-3">Sign In</div>
                    <!-- Social login links-->
                    <a href="#"><x-icon-facebook class="text-primary w-20"/></a>
                    <a href="#"><x-icon-github class="text-default w-20"/></a>
                    <a href="#"><x-icon-google class="text-danger w-20"/></a>
                    <a href="#"><x-icon-twitter class="text-primary w-20"/></a>
                </div>
                <hr class="my-0" />
                <div class="card-body p-5">
                    <!-- Login form-->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="emailExample">Email Address</label>
                            <input class="form-control form-control-solid form-control-sm" type="email" placeholder="" aria-label="Email Address" aria-describedby="emailExample" name="email" autofocus/>
                        </div>
                        <!-- Form Group (password)-->
                        <div class="mb-3">
                            <label class="text-gray-600 small" for="passwordExample">Password</label>
                            <input class="form-control form-control-solid form-control-sm" type="password" placeholder="" aria-label="Password" aria-describedby="passwordExample" name="password" required autocomplete="current-password" />
                        </div>
                        <!-- Form Group (forgot password link)-->
                        <div class="mb-3"><a class="small" href="{{ route('password.request') }}">Forgot your password?</a></div>
                        <!-- Form Group (login box)-->
                        <div class="d-flex align-items-center justify-content-between mb-0">
                            <div class="form-check">
                                <input class="form-check-input" id="checkRememberPassword" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}/>
                                <label class="form-check-label" for="checkRememberPassword">Remember password</label>
                            </div>
                            <button class="btn btn-primary btn-sm" type="submit">Login</button>
                        </div>
                    </form>
                </div>
                <hr class="my-0" />
                <div class="card-body px-5 py-4">
                    <div class="small text-center">
                        New user?
                        <a href="{{ route('register') }}">Create an account!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
