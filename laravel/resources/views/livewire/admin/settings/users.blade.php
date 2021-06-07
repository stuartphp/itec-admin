<div class="card">
    <div class="card-header">{{ __('global.menu.setup.title')}} / {{ __('global.menu.setup.sub.users') }}</div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Title</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th class="col-1">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->lastname }}</td>
                        <td>{{ $item->firstname }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->mobile_number }}</td>
                        <td>{{ $item->email }}</td>
                        <td></td>
                        <td><select class="form-select form-select-sm" onchange="doAction({{ $item->id }}, this.value)">
                            <option value="">Select</option>
                            <option value="edit">Edit</option>
                            <option value="images">Images</option>
                            <option value="delete">Delete</option>
                        </select></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="fard-footer"></div>
</div>
