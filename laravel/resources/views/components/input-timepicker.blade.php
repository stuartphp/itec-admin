@props(['id', 'title'])
<div class="mb-3 row">
    <label for="{{ $id }}" class="col-md-3">{{ $title }}</label>
    <div class="col-md-9">
        <div class="">
            <input {{ $attributes }}
                x-data
                x-ref="input"
                x-init="new flatpickr($refs.input, {enableTime: true, dateFormat: 'Y-m-d H:i', })"
                @change="$dispatch('input', $event.target.value)"
                class="form-control form-control-sm @error('{{ $id }}') is-invalid @enderror"
                id="{{ $id }}"
                name="{{ $id }}" />
            @error('{{ $id }}')
                <span class="invalid-feedback"
                    role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
