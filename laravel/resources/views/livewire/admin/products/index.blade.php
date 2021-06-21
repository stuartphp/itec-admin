<div>
    <a href="#" onclick="openNav()" style="position: absolute; top:45px; left:15px; z-index:1000">
        <x-icon-list style="width: 20px" /></i>
    </a>
    <nav class="navbar navbar-expand-lg navbar-light" id="items_nav" style="background-color: #EDF1ED">
        <div class="container-fluid">
            <div class="navbar-brand ps-3">{{ $product['product_code'] }} : {{ $product['name'] }}</div>
            <ul class="nav nav-pills" id="detailTab">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab" data-bs-toggle="tab" href="#product" role="tab"
                        aria-controls="product" aria-selected="true">Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="dimentions-tab" data-bs-toggle="tab" href="#dimentions" role="tab"
                        aria-controls="dimentions" aria-selected="true">Dimentions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="prices-tab" data-bs-toggle="tab" href="#prices" role="tab"
                        aria-controls="prices" aria-selected="false">Prices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="options-tab" data-bs-toggle="tab" href="#options" role="tab"
                        aria-controls="options" aria-selected="false">Options</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="levels-tab" data-bs-toggle="tab" href="#levels" role="tab"
                        aria-controls="levels" aria-selected="false">Levels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="images-tab" data-bs-toggle="tab" href="#images" role="tab"
                        aria-controls="images" aria-selected="false">Images</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="activities-tab" data-bs-toggle="tab" href="#activities" role="tab"
                        aria-controls="activities" aria-selected="false">Activities</a>
                </li>
            </ul>
    </nav>
    <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
           @livewire('admin.products.information', ['id'=>$product['id']])
        </div>
        <div class="tab-pane fade show" id="dimentions" role="tabpanel" aria-labelledby="dimentions-tab">
                <div class="card">
                    <div class="card-header">{{ __('Dimentions') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="weight_gram"
                                        class="col-md-3">{{ __('products.fields.weight_gram') }}</label>
                                    <div class="col-md-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('weight_gram') is-invalid @enderror"
                                            id="weight_gram" wire:model.defer="size.weight_gram" />
                                        @error('weight_gram') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="length_cm"
                                        class="col-md-3">{{ __('products.fields.length_cm') }}</label>
                                    <div class="col-md-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('length_cm') is-invalid @enderror"
                                            id="length_cm" wire:model.defer="size.length_cm" />
                                        @error('length_cm') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="width_cm"
                                        class="col-md-3">{{ __('products.fields.width_cm') }}</label>
                                    <div class="col-md-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('width_cm') is-invalid @enderror"
                                            id="width_cm" wire:model.defer="size.width_cm" />
                                        @error('width_cm') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 row">
                                    <label for="height_cm"
                                        class="col-md-3">{{ __('products.fields.height_cm') }}</label>
                                    <div class="col-md-9">
                                        <input type="text"
                                            class="form-control form-control-sm @error('height_cm') is-invalid @enderror"
                                            id="height_cm" wire:model.defer="size.height_cm" />
                                        @error('height_cm') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="expiry_date"
                                        class="col-md-3">{{ __('products.fields.expiry_date') }}</label>
                                    <div class="col-md-9">
                                        <input type="text"
                                            class="form-control form-control-sm date @error('expiry_date') is-invalid @enderror"
                                            id="expiry_date" wire:model.defer="size.expiry_date" />
                                        @error('expiry_date') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-end">
                            <button type="button" wire:click.prevent="sizeUpdate" class="btn btn-outline-primary btn-sm">Save</button>
                        </div>
                    </div>
                </div>
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
