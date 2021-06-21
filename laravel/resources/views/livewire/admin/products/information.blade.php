<div>
    <div class="card">
        <div class="card-header">{{ __('Information') }}</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <label for="product_category_id"
                            class="col-md-3">{{ __('products.fields.product_category_id') }}</label>
                        <div class="col-md-9">
                            {{ $information['category']['name'] }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="product_code" class="col-md-3">{{ __('products.fields.product_code') }}</label>
                        <div class="col-md-9">
                            {{ $information['product_code'] }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-3">{{ __('products.fields.name') }}</label>
                        <div class="col-md-9">
                            {{ $information['name'] }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="slug" class="col-md-3">{{ __('products.fields.slug') }}</label>
                        <div class="col-md-9">
                            {{ $information['slug'] }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keywords" class="col-md-3">{{ __('products.fields.keywords') }}</label>
                        <div class="col-md-9">
                            {{ $information['keywords'] }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="barcode" class="col-md-3">{{ __('products.fields.barcode') }}</label>
                        <div class="col-md-9">
                            {{ $information['barcode'] }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="isbn_number" class="col-md-3">{{ __('products.fields.isbn_number') }}</label>
                        <div class="col-md-9">
                            {{ $information['isbn_number'] }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="unit" class="col-md-3">{{ __('products.fields.unit') }}</label>
                        <div class="col-md-9">
                            {{ $units[$information['product_unit_id']] }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 row">
                        <label for="description">{{ __('products.fields.description') }}</label>
                        <div>
                            {!! $information['description'] !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="is_feature"
                                    class="col-md-10">{{ __('products.fields.is_feature') }}</label>
                                <div class="col-md-2">
                                    {{ $information['is_feature'] == 0 ? 'No' : 'Yes' }}
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="is_service"
                                    class="col-md-10">{{ __('products.fields.is_service') }}</label>
                                <div class="col-md-2">
                                    {{ $information['is_service'] == 0 ? 'No' : 'Yes' }}
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="is_active"
                                    class="col-md-10">{{ __('products.fields.is_active') }}</label>
                                <div class="col-md-2">
                                    {{ $information['is_active'] == 0 ? 'No' : 'Yes' }}
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="main_image">{{ __('products.fields.main_image') }}</label>

                                <img src="/images/products/{{ isset($product['main_image']) ? ($product['main_image'] > 0 ? $product['main_image'] : '') : 'no-image.jpg' }}"
                                    style=" max-width:120px" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="text-end">
                <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#formModal">Edit</button>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="formModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="product_category_id"
                                    class="col-md-3">{{ __('products.fields.product_category_id') }}</label>
                                <div class="col-md-9">
                                    <select
                                        class="form-select form-select-sm select2 @error('product_category_id') is-invalid @enderror"
                                        id="product_category_id" wire:model.defer="state.product_category_id">
                                        <option value="" disabled>{{ __('global.pleaseSelect') }}</option>
                                        @foreach ($categories as $cat)
                                            @if ($cat->parent_id == 0)
                                                <option value="{{ $cat->id }}">
                                                    {{ $cat->name }}
                                                </option>
                                                @foreach ($categories as $child)
                                                    @if ($child->parent_id == $cat->id)
                                                        <option value="{{ $child->id }}">
                                                            &nbsp;&nbsp;&nbsp;-&nbsp;{{ $cat->name }} /
                                                            {{ $child->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('product_category_id') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="product_code"
                                    class="col-md-3">{{ __('products.fields.product_code') }}</label>
                                <div class="col-md-9">
                                    <input type="text"
                                        class="form-control form-control-sm @error('product_code') is-invalid @enderror"
                                        id="product_code" wire:model.defer="state.product_code" />
                                    @error('product_code') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="name" class="col-md-3">{{ __('products.fields.name') }}</label>
                                <div class="col-md-9">
                                    <input type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        id="name" wire:model.defer="state.name" />
                                    @error('name') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="slug" class="col-md-3">{{ __('products.fields.slug') }}</label>
                                <div class="col-md-9">
                                    <input type="text"
                                        class="form-control form-control-sm @error('slug') is-invalid @enderror"
                                        id="slug" wire:model.defer="state.slug" disabled />
                                    @error('slug') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="keywords" class="col-md-3">{{ __('products.fields.keywords') }}</label>
                                <div class="col-md-9">
                                    <input type="text"
                                        class="form-control form-control-sm @error('keywords') is-invalid @enderror"
                                        id="keywords" wire:model.defer="state.keywords" />
                                    @error('keywords') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="barcode" class="col-md-3">{{ __('products.fields.barcode') }}</label>
                                <div class="col-md-9">
                                    <input type="text"
                                        class="form-control form-control-sm @error('barcode') is-invalid @enderror"
                                        id="barcode" wire:model.defer="state.barcode" />
                                    @error('barcode') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="isbn_number"
                                    class="col-md-3">{{ __('products.fields.isbn_number') }}</label>
                                <div class="col-md-9">
                                    <input type="text"
                                        class="form-control form-control-sm @error('isbn_number') is-invalid @enderror"
                                        id="isbn_number" wire:model.defer="state.isbn_number" />
                                    @error('isbn_number') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="unit" class="col-md-3">{{ __('products.fields.unit') }}</label>
                                <div class="col-md-9">
                                    <select
                                        class="form-select form-select-sm select2 @error('unit') is-invalid @enderror"
                                        id="unit" wire:model.defer="state.product_unit_id">
                                        <option value="">{{ __('global.pleaseSelect') }}</option>
                                        @foreach ($units as $k => $v)
                                            <option value="{{ $k }}">{{ $v }} </option>
                                        @endforeach
                                    </select>
                                    @error('unit') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 row">
                                <label for="description">{{ __('products.fields.description') }}</label>
                                <div>
                                    <textarea
                                        class="form-control form-control-sm @error('description') is-invalid @enderror"
                                        id="description" wire:model.defer="state.description" />
                                    </textarea>
                                    @error('description') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span>@enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label for="is_feature"
                                            class="col-md-10">{{ __('products.fields.is_feature') }}</label>
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input @error('is_feature') is-invalid @enderror"
                                                    id="is_feature" wire:model.defer="state.is_feature" />
                                            </div>
                                            @error('is_feature') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="is_service"
                                            class="col-md-10">{{ __('products.fields.is_service') }}</label>
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input @error('is_service') is-invalid @enderror"
                                                    id="is_service" wire:model.defer="state.is_service" />
                                            </div>
                                            @error('is_service') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="is_active"
                                            class="col-md-10">{{ __('products.fields.is_active') }}</label>
                                        <div class="col-md-2">
                                            <div class="form-check">
                                                <input type="checkbox"
                                                    class="form-check-input @error('is_active') is-invalid @enderror"
                                                    id="is_active" wire:model.defer="state.is_active" />
                                            </div>
                                            @error('is_active') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 row">
                                        <label for="main_image">{{ __('products.fields.main_image') }}</label>
                                        <img src="/images/products/{{ isset($product['main_image']) ? ($product['main_image'] > 0 ? $product['main_image'] : '') : 'no-image.jpg' }}"
                                            style=" max-width:120px" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary btn-sm" wire:click="updateChanges">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
