@props(['id', 'error'])

<input
    x-data
    x-ref="input"
    x-init="new Pikaday({ field: $refs.input, format: 'YYYY-MM-DD' })"
    class="form-control form-control-sm @error($error) is-invalid @enderror"
    @change="$dispatch('input', $event.target.value)"
    {{ $attributes }}
>

