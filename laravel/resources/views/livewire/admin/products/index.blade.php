<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-8">{{ __('products.title') }}</div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-1">
                        <a href="/admin/products/items/create"><i class="bi bi-plus"></i></a>
                    </div>
                    <div class="col-3"><select  class="form-select form-select-sm" wire:model="page_size">
                        <option value="12">12</option>
                        <option value="16">16</option>
                        <option value="20">20</option>
                    </select></div>
                    <div class="col-8"><input type="search" class="form-control form-control-sm" wire:model="search" placeholder="Search"/></div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('products.fields.product_category_id') }}</th>
					<th>{{ __('products.fields.product_code') }}</th>
					<th>{{ __('products.fields.name') }}</th>
					<th>{{ __('products.fields.slug') }}</th>
					<th>{{ __('products.fields.description') }}</th>

                    <th class="col-1">{{ __('global.action') }}</th>
                </tr>
            </thead>
			<tbody>
				@foreach($data as $item)
					<tr>
						<td>{{ $item->product_category_id }}</td>
					<td>{{ $item->product_code }}</td>
					<td>{{ $item->name }}</td>
					<td>{{ $item->slug }}</td>
					<td>{{ $item->description }}</td>

						<td class="col-1"><select class="form-select form-select-sm" onchange="doAction({{ $item->id }}, this.value)">
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

