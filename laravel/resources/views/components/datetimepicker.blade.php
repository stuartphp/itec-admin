@props(['id', 'error'])

<input {{ $attributes }} type="text" class="form-control datetimepicker-input @error($error) is-invalid @enderror" id="{{ $id }}" data-toggle="datetimepicker" data-target="#{{ $id }}"
onchange="this.dispatchEvent(new InputEvent('input'))"
/>


@push('scripts')
<script type="text/javascript">
    $('#{{ $id }}').datetimepicker({
    	format: 'YYYY-MM-DD HH:mm:ss',
        locale: 'en',
        sideBySide: true
    });
</script>
@endpush
