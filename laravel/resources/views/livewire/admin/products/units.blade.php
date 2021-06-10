<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-8">{{ __('product_units.title') }}</div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-1">
                            <a href="" wire:click.prevent="doAction(0,'add')"><i class="bi bi-plus fa-menu"></i></a>
                        </div>
                        <div class="col-3"><select class="form-select form-select-sm" wire:model="page_size">
                                <option value="12">12</option>
                                <option value="16">16</option>
                                <option value="20">20</option>
                            </select></div>
                        <div class="col-8"><input type="search" class="form-control form-control-sm" wire:model="search"
                                placeholder="Search" /></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('product_units.fields.name') }}</th>

                        <th class="col-1">{{ __('global.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td class="col-1"><select class="form-select form-select-sm"
                                    wire:change="doAction({{ $item->id }}, $event.target.value)"
                                    id="action_{{ $item->id }}"
                                    onchange="setTimeout(()=>{ $('#action_{{ $item->id }}').val('');},500)">
                                    <option value="">Select</option>
                                    <option value="edit">Edit</option>
                                    <option value="delete">Delete</option>
                                </select></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $data->links() }}
        </div>
    </div>
    <div class="modal" tabindex="-1" id="formModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{ $modal_title }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="name" class="col-md-3">{{ __('product_units.fields.name') }}</label>
                    <div class="col-md-9">
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror"
                            id="name" wire:model.defer="stage.name"/>
                        @error('name') <span class="invalid-feedback"
                            role="alert"><strong>{{ $message }}</strong></span>@enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="is_active" class="col-md-3">{{ __('product_categories.fields.is_active') }}</label>
                    <div class="col-md-9">
                        <select class="form-select form-select-sm"
                                id="is_active" wire:model.defer="state.is_active">
                            <option value="" disabled>{{ __('global.select') }}</option>
                            @foreach(__('global.yesno') as $k=>$v)
                                <option value="{{ $k }}">{{ $v }}</option>
                            @endforeach
                            </select>
                       
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-{{ $modal_btn }} btn-sm">{{ $modal_btn_title }}</button>
            </div>
          </div>
        </div>
      </div>

</div>
