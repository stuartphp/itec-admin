@props(['id', 'error'])

<input {{ $attributes }}
    type="text"
    class="form-control form-control-sm @error('{{ $id }}') is-invalid @enderror"
    id="{{ $id }}"
    name="{{ $id }}" />
@error('{{ $id }}')
    <span class="invalid-feedback"
        role="alert">
        <strong>{{ $error ?? '' }}</strong>
    </span>
@enderror

