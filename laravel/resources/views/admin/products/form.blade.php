@extends('layouts.admin')
@section('titile', "products")
@section('content')
<form method="POST" action="/admin/products/items/table{{ (isset($data)) ? '/'.$data->id : '' }}" enctype="multipart/form-data">
    @csrf
    @if(isset($data)) <input type="hidden" name="_method" value="PUT" /> @endif
    <div class="card">
        <div class="card-header"><a href="/admin/products/items">{{ __('products.title') }}</a> / {{ isset($data) ? __('global.update') : __('global.add_new_record') }}</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <label for="product_category_id" class="col-md-3">{{ __('products.fields.product_category_id') }}</label>
                        <div class="col-md-9">
                            <select class="form-select form-select-sm select @error('product_category_id') is-invalid @enderror" id="product_category_id" name="product_category_id">
                                <option value="">{{ __('global.pleaseSelect') }}</option>
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
                            @error('product_category_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="product_code" class="col-md-3">{{ __('products.fields.product_code') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm @error('product_code') is-invalid @enderror" id="product_code" name="product_code" value="{{ isset($data) ? $data->product_code : old('product_code')}}" />
                            @error('product_code') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-3">{{ __('products.fields.name') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ isset($data) ? $data->name : old('name')}}" />
                            @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="slug" class="col-md-3">{{ __('products.fields.slug') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ isset($data) ? $data->slug : old('slug')}}" />
                            @error('slug') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-md-3">{{ __('products.fields.description') }}</label>
                        <div class="col-md-9">
                            <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" id="description" name="description" />@if(isset($data)) {!! $data->description !!}@endif</textarea>
                            @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keywords" class="col-md-3">{{ __('products.fields.keywords') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm @error('keywords') is-invalid @enderror" id="keywords" name="keywords" value="{{ isset($data) ? $data->keywords : old('keywords')}}" />
                            @error('keywords') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="barcode" class="col-md-3">{{ __('products.fields.barcode') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm @error('barcode') is-invalid @enderror" id="barcode" name="barcode" value="{{ isset($data) ? $data->barcode : old('barcode')}}" />
                            @error('barcode') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="isbn_number" class="col-md-3">{{ __('products.fields.isbn_number') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm @error('isbn_number') is-invalid @enderror" id="isbn_number" name="isbn_number" value="{{ isset($data) ? $data->isbn_number : old('isbn_number')}}" />
                            @error('isbn_number') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="unit" class="col-md-3">{{ __('products.fields.unit') }}</label>
                        <div class="col-md-9">
                            <select class="form-select form-select-sm select @error('unit') is-invalid @enderror" id="unit" name="unit">
                                <option value="">{{ __('global.pleaseSelect') }}</option>
                            </select>
                            <input type="text" class="form-control form-control-sm @error('unit') is-invalid @enderror" id="unit" name="unit" value="{{ isset($data) ? $data->unit : old('unit')}}" />
                            @error('unit') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="currency" class="col-md-3">{{ __('products.fields.currency') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm @error('currency') is-invalid @enderror" id="currency" name="currency" value="{{ isset($data) ? $data->currency : old('currency')}}" />
                            @error('currency') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="allow_tax" class="col-md-3">{{ __('products.fields.allow_tax') }}</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('allow_tax') is-invalid @enderror" id="allow_tax" name="allow_tax" />
                            </div>
                            @error('allow_tax') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <label for="weight_gram" class="col-md-3">{{ __('products.fields.weight_gram') }}</label>
                        <div class="col-md-9">
                            <select class="form-select form-select-sm select @error('weight_gram') is-invalid @enderror" id="weight_gram" name="weight_gram">
                                <option value="">{{ __('global.pleaseSelect') }}</option>
                            </select>
                            <input type="text" class="form-control form-control-sm @error('weight_gram') is-invalid @enderror" id="weight_gram" name="weight_gram" value="{{ isset($data) ? $data->weight_gram : old('weight_gram')}}" />
                            @error('weight_gram') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="length_cm" class="col-md-3">{{ __('products.fields.length_cm') }}</label>
                        <div class="col-md-9">
                            <select class="form-select form-select-sm select @error('length_cm') is-invalid @enderror" id="length_cm" name="length_cm">
                                <option value="">{{ __('global.pleaseSelect') }}</option>
                            </select>
                            <input type="text" class="form-control form-control-sm @error('length_cm') is-invalid @enderror" id="length_cm" name="length_cm" value="{{ isset($data) ? $data->length_cm : old('length_cm')}}" />
                            @error('length_cm') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="width_cm" class="col-md-3">{{ __('products.fields.width_cm') }}</label>
                        <div class="col-md-9">
                            <select class="form-select form-select-sm select @error('width_cm') is-invalid @enderror" id="width_cm" name="width_cm">
                                <option value="">{{ __('global.pleaseSelect') }}</option>
                            </select>
                            <input type="text" class="form-control form-control-sm @error('width_cm') is-invalid @enderror" id="width_cm" name="width_cm" value="{{ isset($data) ? $data->width_cm : old('width_cm')}}" />
                            @error('width_cm') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="height_cm" class="col-md-3">{{ __('products.fields.height_cm') }}</label>
                        <div class="col-md-9">
                            <select class="form-select form-select-sm select @error('height_cm') is-invalid @enderror" id="height_cm" name="height_cm">
                                <option value="">{{ __('global.pleaseSelect') }}</option>
                            </select>
                            <input type="text" class="form-control form-control-sm @error('height_cm') is-invalid @enderror" id="height_cm" name="height_cm" value="{{ isset($data) ? $data->height_cm : old('height_cm')}}" />
                            @error('height_cm') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="expiry_date" class="col-md-3">{{ __('products.fields.expiry_date') }}</label>
                        <div class="col-md-9">
                            <input type="date" class="form-control form-control-sm date @error('expiry_date') is-invalid @enderror" id="expiry_date" name="expiry_date" />
                            @error('expiry_date') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="main_image" class="col-md-3">{{ __('products.fields.main_image') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm @error('main_image') is-invalid @enderror" id="main_image" name="main_image" value="{{ isset($data) ? $data->main_image : old('main_image')}}" />
                            @error('main_image') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="purchase_tax_type" class="col-md-3">{{ __('products.fields.purchase_tax_type') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm @error('purchase_tax_type') is-invalid @enderror" id="purchase_tax_type" name="purchase_tax_type" value="{{ isset($data) ? $data->purchase_tax_type : old('purchase_tax_type')}}" />
                            @error('purchase_tax_type') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sales_tax_type" class="col-md-3">{{ __('products.fields.sales_tax_type') }}</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control form-control-sm @error('sales_tax_type') is-invalid @enderror" id="sales_tax_type" name="sales_tax_type" value="{{ isset($data) ? $data->sales_tax_type : old('sales_tax_type')}}" />
                            @error('sales_tax_type') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sales_commission_item" class="col-md-3">{{ __('products.fields.sales_commission_item') }}</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('sales_commission_item') is-invalid @enderror" id="sales_commission_item" name="sales_commission_item" />
                            </div>
                            @error('sales_commission_item') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="viewed" class="col-md-3">{{ __('products.fields.viewed') }}</label>
                        <div class="col-md-9">
                            <select class="form-select form-select-sm select @error('viewed') is-invalid @enderror" id="viewed" name="viewed">
                                <option value="">{{ __('global.pleaseSelect') }}</option>
                            </select>
                            <input type="text" class="form-control form-control-sm @error('viewed') is-invalid @enderror" id="viewed" name="viewed" value="{{ isset($data) ? $data->viewed : old('viewed')}}" />
                            @error('viewed') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="is_service" class="col-md-3">{{ __('products.fields.is_service') }}</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('is_service') is-invalid @enderror" id="is_service" name="is_service" />
                            </div>
                            @error('is_service') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="is_active" class="col-md-3">{{ __('products.fields.is_active') }}</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="is_active" name="is_active" />
                            </div>
                            @error('is_active') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="is_feature" class="col-md-3">{{ __('products.fields.is_feature') }}</label>
                        <div class="col-md-9">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('is_feature') is-invalid @enderror" id="is_feature" name="is_feature" />
                            </div>
                            @error('is_feature') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="card-footer">
            <div class="text-end"><button class="btn btn-outline-primary btn-sm" type="submit">{{ __('global.save') }}</button></div>
        </div>
    </div>
</form>
@endsection
