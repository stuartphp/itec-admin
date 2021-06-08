@extends('layouts.admin')
@section('titile', "product_units")
@section('content')
<form method="POST" action="/admin/products/units{{ (isset($data)) ? '/'.$data->id : '' }}" enctype="multipart/form-data">
@csrf
@if(isset($data)) <input type="hidden" name="_method" value="PUT"/> @endif
<div class="card">
    <div class="card-header"><a href="/admin/products/units">{{ __('product_units.title') }}</a> / {{ isset($data) ? __('global.update') : __('global.add_new_record') }}</div>
    <div class="card-body">

<div class="mb-3 row">
                <label for="name" class="col-md-3">{{ __('product_units.fields.name') }}</label>
                <div class="col-md-9">
                    <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ isset($data) ? $data->name : old('name')}}"/>
                    @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                </div>
            </div>
    </div>
    <div class="card-footer">
        <div class="text-end"><button class="btn btn-outline-primary btn-sm" type="submit">{{ __('global.save') }}</button></div>
    </div>
</div>
</form>
@endsection
