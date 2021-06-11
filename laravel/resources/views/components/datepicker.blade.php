@props(['id', 'error'])

<input
    x-data
    x-ref="input"
    x-init="new flatpickr($refs.input, {enableTime: true, dateFormat: 'Y-m-d H:i', })"
    class="form-control form-control-sm @error($error) is-invalid @enderror"
    @change="$dispatch('input', $event.target.value)"
    {{ $attributes }}
>

