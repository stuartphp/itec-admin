@extends('layouts.admin')
@section('title', 'Management; Customers')
@section('content')
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="users"></i></div>
                            Customers
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fuild px-4 mt-4">
        <!-- Account details card-->
        <div class="card mb-4">
            <div class="card-header">@if(isset($data)) {{ $data->trading_name }} : Update  @else Add New Customer  @endif</div>
            <div class="card-body">
                <form>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="registered_name">Registered Name</label>
                            <input class="form-control form-control-sm" id="registered_name" type="text" name="registered_name"
                                value="{{ isset($data) ? $data->registered_name : old('registered_name') }}" />
                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="trading_name">Trading Name</label>
                            <input class="form-control form-control-sm @error('trading_name') is-invalid @enderror" id="trading_name" type="text" name="trading_name"
                                value="{{ isset($data) ? $data->trading_name : old('trading_name')}}" />
                                @error('trading_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="contact_person">Contact Person</label>
                            <input class="form-control form-control-sm @error('contact_person') is-invalid @enderror" id="contact_person" type="text" name="contact_person"
                                value="{{ isset($data) ? $data->contact_person : old('contact_person')}}" />
                            @error('contact_person')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="mobile_number">Mobile Number</label>
                            <input class="form-control form-control-sm @error('mobile_number') is-invalid @enderror"
                                id="mobile_number" type="number" placeholder="0821234567" name="mobile_number"
                                value="{{ isset($data) ? $data->contact_person : old('mobile_number')}}" required autocomplete="mobile_number" />
                            @error('mobile_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="fax">Fax</label>
                            <input class="form-control form-control-sm @error('fax') is-invalid @enderror" id="fax" type="text" name="fax"
                                value="{{ isset($data) ? $data->fax : old('fax')}}" />
                            @error('fax')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="telephone">Telephone</label>
                            <input class="form-control form-control-sm @error('telephone') is-invalid @enderror"
                                id="telephone" type="text" name="telephone"
                                value="{{ isset($data) ? $data->contact_person : old('telephone')}}" required autocomplete="telephone" />
                            @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row gx-3 mb-3">
                        <div class="col-md-6">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" type="email" name="email"
                                value="{{ isset($data) ? $data->email : old('email')}}" />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="col-md-6">
                            <label class="small mb-1" for="password">Password</label>
                            <input class="form-control form-control-sm @error('password') is-invalid @enderror"
                                id="password" type="text" name="password"
                                value="{{ isset($data) ? $data->contact_person : old('password')}}" required autocomplete="password" />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
