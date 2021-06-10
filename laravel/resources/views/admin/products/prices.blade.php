<div>
    <div class="card  mt-3">
        <div class="card-header">Prices</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('product_prices.fields.store_id') }}</th>
                        <th>{{ __('product_prices.fields.cost_price') }}</th>
                        <th>{{ __('product_prices.fields.retail') }}</th>
                        <th>{{ __('product_prices.fields.dealer') }}</th>
                        <th>{{ __('product_prices.fields.whole_sale') }}</th>
                        <th>{{ __('product_prices.fields.special') }}</th>
                        <th>{{ __('product_prices.fields.special_from') }}</th>
                        <th>{{ __('product_prices.fields.special_to') }}</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($prices as $item)
                    <tr>
                        <td>{{ $item->store->name ?? '-' }}<td>
                        <td>{{ number_format($item->cost_price, 2) ?? '-' }}</td>
                        <td>{{ number_format($item->retail, 2) ?? '-' }}</td>
                        <td>{{ number_format($item->dealer, 2) ?? '-' }}</td>
                        <td>{{ number_format($item->whole_sale, 2) ?? '-' }}</td>
                        <td>{{ number_format($item->special, 2) ?? '-' }}</td>
                        <td>{{ $item->special_from ?? '-' }}</td>
                        <td>{{ $item->special_to ?? '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
