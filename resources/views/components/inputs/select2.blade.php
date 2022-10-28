@props([
    'name',
    'label',
])
<div class="row">
    @if($label ?? null)
        @include('components.inputs.partials.label')
    @endif

    <select
        id="{{ $name }}"
        name="{{ $name }}"
        {{ ($required ?? false) ? 'required' : '' }}
        {{ $attributes->merge(['class' => 'ms-3 border']) }}
    >{{ $slot }}</select>
</div>
