<div class="mt-3">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-7">{{ __('product_prices.title') }}&nbsp;<div wire:loading class="text-warning">Loading...</div></div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-1"><a href="#" wire:click.prevent="loadModal('add', 0)"><i class="bi bi-plus"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row justify-content-start" id="priceTable">
                <div class="col-1 mt-1">
                    <div class="list-group text-end group-title">
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.store_id') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.cost_price') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.retail') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.dealer') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.whole_sale') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.price_list1') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.price_list2') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.price_list3') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.price_list4') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.price_list5') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.special') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.special_from') }}</div>
                        <div class="list-group-item fw-bold">{{ __('product_prices.fields.special_to') }}</div>
                        <div class="list-group-item fw-bold pt-3 pb-2">{{ __('global.action') }}</div>
                    </div>
                </div>
                <div class="col-11">
                    <div class="flow-container flex">
                        @foreach ($prices as $item)
                            <div class="item flex-item">
                                <div class="list-group">
                                    <div class="list-group-item text-center"><b>{{ $item->store->name ?? '-' }}</b>
                                    </div>
                                    <div class="list-group-item text-end">
                                        {{ number_format($item->cost_price, 2) ?? '-' }}</div>
                                    <div class="list-group-item text-end">
                                        {{ number_format($item->retail, 2) ?? '-' }}
                                    </div>
                                    <div class="list-group-item text-end">
                                        {{ number_format($item->dealer, 2) ?? '-' }}
                                    </div>
                                    <div class="list-group-item text-end">
                                        {{ number_format($item->whole_sale, 2) ?? '-' }}</div>
                                    <div class="list-group-item text-end">
                                        {{ number_format($item->price_list1, 2) ?? '-' }}</div>
                                    <div class="list-group-item text-end">
                                        {{ number_format($item->price_list2, 2) ?? '-' }}</div>
                                    <div class="list-group-item text-end">
                                        {{ number_format($item->price_list3, 2) ?? '-' }}</div>
                                    <div class="list-group-item text-end">
                                        {{ number_format($item->price_list4, 2) ?? '-' }}</div>
                                    <div class="list-group-item text-end">
                                        {{ number_format($item->price_list5, 2) ?? '-' }}</div>
                                    <div class="list-group-item text-end">
                                        {{ number_format($item->special, 2) ?? '-' }}
                                    </div>
                                    <div class="list-group-item text-center">{{ $item->special_from ?? '-' }}</div>
                                    <div class="list-group-item text-center">{{ $item->special_to ?? '-' }}</div>
                                    <div class="list-group-item"><select class="form-select form-select-sm"
                                        wire:change="loadModal($event.target.value, {{ $item }})" id="action_{{ $item->id }}" onchange="setTimeout(()=>{ $('#action_{{$item->id}}').val('');},1000)">
                                            <option value="">{{ __('global.select') }}</option>
                                            <option value="copy">{{ __('global.copy') }}</option>
                                            <option value="edit">{{ __('global.edit') }}</option>
                                            <option value="delete">{{ __('global.delete') }}</option>
                                        </select></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="priceModal">
        <div class="modal-dialog @if($action != 'delete') modal-xl @endif">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="priceModalLabel">{{ $modal_title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="@if($action=='delete') d-none @else d-block @endif">
                    <div class="mb-2  row">
                        <label class="col-md-2">{{ __('product_prices.fields.store_id') }}</label>
                        <div class="col-md-2">
                            <select wire:model.defer="state.store_id" id="store_id" class="form-select">
                                <option value="">{{ __('global.select') }}</option>
                                @foreach ($stores as $k => $v)
                                    <option value="{{ $k }}">{{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-md-2">{{ __('product_prices.fields.price_list1') }}</label>
                        <div class="col-md-2">
                            <input type="text" wire:model.defer="state.price_list1" id="price_list1"
                                class="form-control form-control-sm">
                        </div>

                    </div>
                    <div class="mb-2  row">
                        <label class="col-md-2">{{ __('product_prices.fields.cost_price') }}</label>
                        <div class="col-md-2">
                            <input type="text" wire:model.defer="state.cost_price" id="cost_price"
                                class="form-control form-control-sm">
                        </div>
                        <label class="col-md-2">{{ __('product_prices.fields.price_list2') }}</label>
                        <div class="col-md-2">
                            <input type="text" wire:model.defer="state.price_list2" id="price_list2"
                                class="form-control form-control-sm">
                        </div>

                    </div>
                    <div class="mb-2  row">
                        <label class="col-md-2">{{ __('product_prices.fields.retail') }}</label>
                        <div class="col-md-2">
                            <input type="text" wire:model.defer="state.retail" id="retail"
                                class="form-control form-control-sm @error('retail') is-invalid @enderror">
                            @error('retail')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <label class="col-md-2">{{ __('product_prices.fields.price_list3') }}</label>
                        <div class="col-md-2">
                            <input type="text" wire:model.defer="state.price_list3" id="price_list3"
                                class="form-control form-control-sm">
                        </div>

                    </div>
                    <div class="mb-2  row">
                        <label class="col-md-2">{{ __('product_prices.fields.dealer') }}</label>
                        <div class="col-md-2">
                            <input type="text" wire:model.defer="state.dealer" id="dealer" class="form-control form-control-sm">
                        </div>
                        <label class="col-md-2">{{ __('product_prices.fields.price_list4') }}</label>
                        <div class="col-md-2">
                            <input type="text" wire:model.defer="state.price_list4" id="price_list4"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="mb-2  row">
                        <label class="col-md-2">{{ __('product_prices.fields.whole_sale') }}</label>
                        <div class="col-md-2">
                            <input type="text" wire:model.defer="state.whole_sale" id="whole_sale"
                                class="form-control form-control-sm">
                        </div>
                        <label class="col-md-2">{{ __('product_prices.fields.price_list5') }}</label>
                        <div class="col-md-2">
                            <input type="text" wire:model.defer="state.price_list5" id="price_list5"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <div class="col-md-4">
                            <label>{{ __('product_prices.fields.special') }}</label>
                            <div>
                                <input type="text" wire:model.defer="state.special" id="special" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>{{ __('product_prices.fields.special_from') }}</label>
                            <div>
                                <x-datepicker wire:model.defer="state.special_from" id="special_from" :error="'special_from'"/>
                                @error('special_from')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label>{{ __('product_prices.fields.special_to') }}</label>
                            <div>
                            <x-datepicker wire:model.defer="state.special_to" id="special_to" :error="'special_to'"/>
                                @error('special_to')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                @if($action=='delete')  Are you sure you want to delete this record? @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-{{ $modal_btn}} btn-sm" wire:click="recordAction">{{ $modal_btn_title }}</button>
                </div>
            </div>
        </div>
    </div>
</div>
