@extends('layouts.admin')
@section('title', 'Users Profile')
@section('content')
<div class="container">
<div class="card">
    <div class="card-header">
        User : Profile
    </div>
    <div class="card-body">
    <div class="row">
        <div class="col-xl-4">
            @livewire('admin.users.image')
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control form-control-sm" id="inputFirstName" type="text" name="firstname" value="{{ auth()->user()->firstname }}" />
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control form-control-sm" id="inputLastName" type="text" name="lastname" value="{{ auth()->user()->lastname }}" />
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <!-- Form Group (first name)-->

                                    <label class="small mb-1" for="title">Title</label>
                                    <select class="form-select form-select-sm @error('title') is-invalid @enderror" id="title" name="title">
                                        @foreach (__('employee_lookup.title') as $k=>$v )
                                        <option value="{{ $k }}" @if(auth()->user()->title == $k) selected @endif>({{ $k }}) {{ $v }}</option>
                                        @endforeach
                                    </select>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="col-md-6">
                                <!-- Form Group (last name)-->
                                    <label class="small mb-1" for="mobile_number">Mobile Number</label>
                                    <input class="form-control form-control-sm @error('mobile_number') is-invalid @enderror"  id="mobile_number" type="number" placeholder="0821234567" name="mobile_number" value="{{ auth()->user()->mobile_number }}" required autocomplete="mobile_number" />
                                    @error('mobile_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control form-control-sm" id="inputEmailAddress" type="email" name="email" value="{{ auth()->user()->email }}" />
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control form-control-sm" id="inputPhone" type="text" name="phone_number" value="{{ auth()->user()->phone_number }}" />
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputBirthday">Birthday</label>
                                <input class="form-control form-control-sm" id="inputBirthday" type="date" name="date_of_birth" value="{{ auth()->user()->date_of_birth }}" />
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="job_title">Job Title</label>
                                <input class="form-control form-control-sm" id="job_title" type="text" name="job_title" value="{{ auth()->user()->job_title }}" />
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="password">Password</label>
                                <input class="form-control form-control-sm" id="password" type="password" name="password" value="" />
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <div class="text-end">
                            <button class="btn btn-primary btn-sm" type="button">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="card-footer">

    </div>
</div>

</div>
@endsection
