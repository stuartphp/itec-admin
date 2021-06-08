@extends('layouts.admin')
@section('titile', 'product_categories')
@section('content')
    <form method="POST" action="/admin/products/categories{{ (isset($data)) ? '/'.$data->id : '' }}" enctype="multipart/form-data">
        @csrf
        @if (isset($data)) <input type="hidden" name="_method" value="PUT" /> @endif
        <div class="container">
            <div class="card">
                <div class="card-header"><a href="/admin/products/categories">{{ __('product_categories.title') }}</a> / {{ isset($data) ? __('global.update') : __('global.add_new_record') }}</div>
                <div class="card-body">

                    <div class="mb-3 row">
                        <label for="name" class="col-md-3">{{ __('product_categories.fields.name') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ isset($data) ? $data->name : old('name') }}" />
                            @error('name') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="parent_id" class="col-md-3">{{ __('product_categories.fields.parent_id') }}</label>
                        <div class="col-md-9">
                            <select class="form-select form-select-sm select @error('parent_id') is-invalid @enderror"
                                id="parent_id" name="parent_id">
                                <option value="" disabled>{{ __('global.pleaseSelect') }}</option>
                                <option value="0">{{ __('product_categories.fields.parent_id') }}</option>
                                @foreach ($categories as $cat )
                                    @if ($cat->parent_id == 0)
                                        <option value="{{ $cat->id }}" {{ isset($data) ? ($data->parent_id==$cat->id) ? 'selected':'' :'' }}>{{ $cat->name }}</option>
                                            @foreach ($categories as $child )
                                                @if($child->parent_id == $cat->id)
                                                <option value="{{ $child->id }}">&nbsp;&nbsp;&nbsp;-&nbsp;{{ $child->name }}</option>
                                                @endif
                                            @endforeach
                                    @endif
                                @endforeach
                            </select>
                            @error('parent_id') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="is_active" class="col-md-3">{{ __('product_categories.fields.is_active') }}</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror"
                                    id="is_active" name="is_active" {{ isset($data) ? ($data->is_active==1) ? 'checked':'' :'' }} />
                            </div>
                            @error('is_active') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-end"><button class="btn btn-outline-primary btn-sm"
                            type="submit">{{ __('global.save') }}</button></div>
                </div>
            </div>
        </div>
    </form>
@endsection
