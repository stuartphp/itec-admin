<div class="card">
    <div class="card-header">{{ __('Information') }}</div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 row">
                    <label for="product_category_id" class="col-md-3">{{ __('products.fields.product_category_id') }}</label>
                    <div class="col-md-9" id="show_product_category_id"></div>
                </div>
                <div class="mb-3 row">
                    <label for="product_code" class="col-md-3">{{ __('products.fields.product_code') }}</label>
                    <div class="col-md-9" id="show_product_code">

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-md-3">{{ __('products.fields.name') }}</label>
                    <div class="col-md-9" id="show_name">

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="slug" class="col-md-3">{{ __('products.fields.slug') }}</label>
                    <div class="col-md-9" id="show_slug">

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="keywords" class="col-md-3">{{ __('products.fields.keywords') }}</label>
                    <div class="col-md-9" id="show_keywords">

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="barcode" class="col-md-3">{{ __('products.fields.barcode') }}</label>
                    <div class="col-md-9" id="show_barcode">

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="isbn_number" class="col-md-3">{{ __('products.fields.isbn_number') }}</label>
                    <div class="col-md-9" id="show_isbn_number">

                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="unit" class="col-md-3">{{ __('products.fields.unit') }}</label>
                    <div class="col-md-9" id="show_unit">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 row">
                    <label for="description">{{ __('products.fields.description') }}</label>
                    <div id="show_description">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label for="is_feature" class="col-md-10">{{ __('products.fields.is_feature') }}</label>
                            <div class="col-md-2" id="show_is_feature">

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="is_service" class="col-md-10">{{ __('products.fields.is_service') }}</label>
                            <div class="col-md-2" id="show_is_service">

                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="is_active" class="col-md-10">{{ __('products.fields.is_active') }}</label>
                            <div class="col-md-2" id="show_is_active">

                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label for="main_image">{{ __('products.fields.main_image') }}</label>
                            <img src="/images/products/no-image.jpg" style=" max-width:120px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="text-end">
            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#formModal">Edit</button>
        </div>
    </div>
</div>
<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 row">
                            <label for="product_category_id" class="col-md-3">{{ __('products.fields.product_category_id') }}</label>
                            <div class="col-md-9">
                                <select class="form-select form-select-sm select2 @error('product_category_id') is-invalid @enderror" id="product_category_id" name="product_category_id">
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
                                <input type="text" class="form-control form-control-sm @error('product_code') is-invalid @enderror" id="product_code" name="product_code" />
                                @error('product_code') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name" class="col-md-3">{{ __('products.fields.name') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" />
                                @error('name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="slug" class="col-md-3">{{ __('products.fields.slug') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-sm @error('slug') is-invalid @enderror" id="slug" name="slug" disabled />
                                @error('slug') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="keywords" class="col-md-3">{{ __('products.fields.keywords') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-sm @error('keywords') is-invalid @enderror" id="keywords" name="keywords"/>
                                @error('keywords') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="barcode" class="col-md-3">{{ __('products.fields.barcode') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-sm @error('barcode') is-invalid @enderror" id="barcode" name="barcode"/>
                                @error('barcode') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="isbn_number" class="col-md-3">{{ __('products.fields.isbn_number') }}</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control form-control-sm @error('isbn_number') is-invalid @enderror" id="isbn_number" name="isbn_number"/>
                                @error('isbn_number') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="product_unit_id" class="col-md-3">{{ __('products.fields.product_unit_id') }}</label>
                            <div class="col-md-9">
                                <select class="form-select form-select-sm select2 @error('product_unit_id') is-invalid @enderror" id="product_unit_id" name="product_unit_id">
                                    <option value="">{{ __('global.pleaseSelect') }}</option>
                                    @foreach ($units as $k => $v)
                                    <option value="{{ $k }}">{{ $v }} </option>
                                    @endforeach
                                </select>
                                @error('product_unit_id') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary btn-sm">Save changes</button>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
    $(function() {
        loadInformation();
    });
    $('.select2').select2({
        dropdownParent: $('#formModal')
    });
    $(document).ready(function() {
        $('#description').summernote({
            dialogsInBody: true,
            tabsize: 2,
            height: 157,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                // ['insert', ['link', 'picture']],
                // ['view', ['help']]
            ]
        });
    });

    function loadInformation() {
        // Fetch Product Information
        $.ajax({
            url: '/admin/products/items/{{ $id}}',
            dataType: 'JSON',
            method: 'GET',
            success: function(response) {
                $('#product_category_id').val(response.product_category_id);
                $('#product_code').val(response.product_code);
                $('#name').val(response.name);
                $('#slug').val(response.slug);
                $('#keywords').val(response.keywords);
                $('#barcode').val(response.barcode);
                $('#isbn_number').val(response.isbn_number);
                $('#product_unit_id').val(response.product_unit_id);
                $('#show_product_category_id').html(response.category.name);
                $('#show_product_code').html(response.product_code);
                $('#show_name').html(response.name);
                $('#show_keywords').html(response.keywords);
                $('#show_slug').html(response.slug);
                $('#show_barcode').html(response.barcode);
                $('#show_unit').html(response.units.name);
                $('#show_isbn_number').html(response.isbn_number);
                $('#show_description').html(response.description);
                $('#show_is_feature').html(response.is_feature === 0 ? 'No' : 'Yes');
                $('#show_is_service').html(response.is_service === 0 ? 'No' : 'Yes');
                $('#show_is_active').html(response.is_active === 0 ? 'No' : 'Yes');
            }
        });
    }
</script>
@endsection
