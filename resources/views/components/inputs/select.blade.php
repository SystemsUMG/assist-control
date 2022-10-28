@props([
    'name',
    'label',
    'type' => 'text',
])
<div class="input-group input-group-static mb-4">
    @if($label ?? null)
        <label for="{{ $name }}" class="ms-0">{{ $label }}</label>
    @endif

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ ($required ?? false) ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'form-control']) }}
        autocomplete="off"
    >{{ $slot }}</select>
</div>
@error($name)
@include('components.inputs.partials.error')
@enderror
