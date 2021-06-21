<div>
    <a href="#" onclick="openNav()" style="position: absolute; top:45px; left:15px; z-index:1000">
        <x-icon-list style="width: 20px" /></i>
    </a>
    <nav class="navbar navbar-expand-lg navbar-light" id="items_nav" style="background-color: #EDF1ED">
        <div class="container-fluid">
            <div class="navbar-brand ps-3">{{ $product['product_code'] }} : {{ $product['name'] }}</div>
            <ul class="nav nav-pills" id="detailTab">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab" data-bs-toggle="tab" href="#product" role="tab" aria-controls="product" aria-selected="true">Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="dimentions-tab" data-bs-toggle="tab" href="#dimentions" role="tab" aria-controls="dimentions" aria-selected="true">Dimentions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="prices-tab" data-bs-toggle="tab" href="#prices" role="tab" aria-controls="prices" aria-selected="false">Prices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="options-tab" data-bs-toggle="tab" href="#options" role="tab" aria-controls="options" aria-selected="false">Options</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="levels-tab" data-bs-toggle="tab" href="#levels" role="tab" aria-controls="levels" aria-selected="false">Levels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images" role="tab" aria-controls="images" aria-selected="false">Images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="activities-tab" data-bs-toggle="tab" href="#activities" role="tab" aria-controls="activities" aria-selected="false">Activities</a>
                </li>
            </ul>
    </nav>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
            <form autocomplete="off">
                <div class="card">
                    <div class="card-header">{{ __('Information') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="product_category_id" class="col-md-3">{{ __('products.fields.product_category_id') }}</label>
                                    <div class="col-md-9">
                                        <select class="form-select form-select-sm select @error('product_category_id') is-invalid @enderror" id="product_category_id" wire:model.defer="product.product_category_id">
                                            <option value="" disabled>{{ __('global.pleaseSelect') }}</option>
                                            @foreach ($categories as $cat)
                                            @if ($cat->parent_id == 0)
                                            <option value="{{ $cat->id }}">
                                                {{ $cat->name }}
                                            </option>
                                            @foreach ($categories as $child)
                                            @if ($child->parent_id == $cat->id)
                                            <option value="{{ $child->id }}">
                                                &nbsp;&nbsp;&nbsp;-&nbsp;{{ $cat->name }} / {{ $child->name }}
                                            </option>
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
                                        <input type="text" class="form-control form-control-sm @error('product_code') is-invalid @enderror" id="product_code" wire:model.defer="product.product_code" />
                                        @error('product_code') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="name" class="col-md-3">{{ __('products.fields.name') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" wire:model.defer="product.name" />
                                        @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="slug" class="col-md-3">{{ __('products.fields.slug') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control form-control-sm @error('slug') is-invalid @enderror" id="slug" wire:model.defer="product.slug" disabled />
                                        @error('slug') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="keywords" class="col-md-3">{{ __('products.fields.keywords') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control form-control-sm @error('keywords') is-invalid @enderror" id="keywords" wire:model.defer="product.keywords" />
                                        @error('keywords') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="barcode" class="col-md-3">{{ __('products.fields.barcode') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control form-control-sm @error('barcode') is-invalid @enderror" id="barcode" wire:model.defer="product.barcode" />
                                        @error('barcode') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="isbn_number" class="col-md-3">{{ __('products.fields.isbn_number') }}</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control form-control-sm @error('isbn_number') is-invalid @enderror" id="isbn_number" wire:model.defer="product.isbn_number" />
                                        @error('isbn_number') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="unit" class="col-md-3">{{ __('products.fields.unit') }}</label>
                                    <div class="col-md-9">
                                        <select class="form-select form-select-sm select @error('unit') is-invalid @enderror" id="unit" wire:model.defer="product.product_unit_id">
                                            <option value="">{{ __('global.pleaseSelect') }}</option>
                                            @foreach ($units as $k => $v)
                                            <option value="{{ $k }}">{{ $v }} </option>
                                            @endforeach
                                        </select>
                                        @error('unit') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="description">{{ __('products.fields.description') }}</label>
                                    <div>
                                        <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" id="description" name="description" />
                                        @if (isset($data)) {!! $data->description !!}@endif</textarea>
                                        @error('description') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">

                    <div class="mb-3 row">
                        <label for="is_feature" class="col-md-10">{{ __('products.fields.is_feature') }}</label>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('is_feature') is-invalid @enderror" id="is_feature" name="is_feature" />
                            </div>
                            @error('is_feature') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="is_service" class="col-md-10">{{ __('products.fields.is_service') }}</label>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('is_service') is-invalid @enderror" id="is_service" name="is_service" />
                            </div>
                            @error('is_service') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="is_active" class="col-md-10">{{ __('products.fields.is_active') }}</label>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="is_active" name="is_active" />
                            </div>
                            @error('is_active') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>
                    </div>

                                </div>
                                <div class="col-md-6">
                                <div class="mb-3 row">
                        <label for="main_image">{{ __('products.fields.main_image') }}</label>

                            <img src="/images/products/{{ isset($data->main_image) ? ($data->main_image>0) ? $data->main_image : '' :'no-image.jpg' }}" style="height: 100px" />

                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer"></div>
                </div>



            </form>
        </div>
        <div class="tab-pane fade show" id="dimentions" role="tabpanel" aria-labelledby="dimentions-tab">

        </div>
        <div class="tab-pane fade" id="prices" role="tabpanel" aria-labelledby="prices-tab">

        </div>
        <div class="tab-pane fade" id="options" role="tabpanel" aria-labelledby="options-tab">
            Options
        </div>
        <div class="tab-pane fade" id="levels" role="tabpanel" aria-labelledby="levels-tab">
            Levels
        </div>
        <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
            Images
        </div>

        <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-tab">
            Activities
        </div>


    </div>
</div>
