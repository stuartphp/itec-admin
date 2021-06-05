@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="container-xl px-4">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <!-- Basic registration form-->
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header justify-content-center"><h3 class="fw-light my-4">Create Account</h3></div>
                <div class="card-body">
                    <!-- Registration form-->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Form Row-->
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <!-- Form Group (first name)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputFirstName">First Name</label>
                                    <input class="form-control form-control-sm @error('firstname') is-invalid @enderror" id="inputFirstName" type="text" placeholder="Enter first name" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" autofocus/>
                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Form Group (last name)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputLastName">Last Name</label>
                                    <input class="form-control form-control-sm @error('lastname') is-invalid @enderror" id="inputLastName" type="text" placeholder="Enter last name" name="lastname" value="{{ old('name') }}" required autocomplete="lastname" />
                                    @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <!-- Form Group (first name)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="title">Title</label>
                                    <select class="form-control form-control-sm @error('title') is-invalid @enderror" id="title" name="title">
                                        @foreach (__('global.title') as $k=>$v )
                                        <option value="{{ $k }}">({{ $k }}) {{ $v }}</option>
                                        @endforeach
                                    </select>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Form Group (last name)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="mobile_number">Mobile Number</label>
                                    <input class="form-control form-control-sm @error('mobile_number') is-invalid @enderror"  id="mobile_number" type="number" placeholder="0821234567" name="mobile_number" value="{{ old('mobile_number') }}" required autocomplete="mobile_number" />
                                    @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Form Group (email address)            -->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                            <input class="form-control form-control-sm @error('email') is-invalid @enderror" id="inputEmailAddress" type="email" aria-describedby="emailHelp" name="email" placeholder="Enter email address"  value="{{ old('email') }}" required autocomplete="email"/>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <!-- Form Row    -->
                        <div class="row gx-3">
                            <div class="col-md-6">
                                <!-- Form Group (password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputPassword">Password</label>
                                    <input class="form-control form-control-sm @error('password') is-invalid @enderror" id="inputPassword" type="password" placeholder="Enter password" name="password"  required autocomplete="new-password"/>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Form Group (confirm password)-->
                                <div class="mb-3">
                                    <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                    <input class="form-control form-control-sm " id="inputConfirmPassword" type="password" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password"/>
                                </div>
                            </div>
                        </div>
                        <!-- Form Group (create account submit)-->
                        <button class="btn btn-primary btn-block btn-sm" type="submit">Create Account</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
