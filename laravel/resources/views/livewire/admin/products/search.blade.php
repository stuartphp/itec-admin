<div id="mySidenav" class="sidenav">
    <div class="head mb-1 ms-2 me-2">
        {{ __('products.title') }}<span style="float:right"><a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></span>
        <div class="row gx-2 align-ite-s-center">
            <div class="col-sm-2">
                <input  wire:model.debounce.300ms="size" type="text" class="form-control form-control-sm"/>
            </div>
            <div class="col-sm-10">
                <input wire:model.debounce.300ms="search" type="text" class="form-control form-control-sm mb-2" placeholder="{{ __('global.search') }}" aria-label="Search" aria-describedby="basic-addon2">
            </div>
        </div>
    </div>
    <div class="list-group ms-3 me-3">
        @foreach ($data as $item)
        <a href="/admin/products/detail/{{ $item->id }}" type="button"  class="list-group-item list-group-item-action @if ($item_id==$item->id) active @endif @if($item->is_active==0) list-group-item-danger @else  list-group-item-success @endif" >{{ strlen($item->product_code.' '.$item->name)>48 ? substr($item->product_code.' '.$item->name,0,46).'...' : $item->product_code.': '.$item->name }}</a>
        @endforeach
        {{ $data->onEachSide(1)->links() }}
        <div class="d-grid pt-1">
            <a class="btn btn-outline-success btn-sm btn-block" id="create_record" type="button" href="/admin/products/items/create">{{ __('global.add_new_record') }}</a>
            <a class="btn btn-outline-warning btn-sm btn-block mt-3 mb-10" id="inventory_help" type="button" href="{{ url('inventory/help') }}">{{ __('global.help') }}</a>
            <p>&nbsp;</p>
        </div>
    </div>
</div>
