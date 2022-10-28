@props([
    'name',
    'label',
    'value',
    'type' => 'text',
    'min' => null,
    'max' => null,
    'step' => null,
])
<div class="row col-12">
    <div class="col-12">
        <div class="input-group input-group-outline my-3 is-filled">
            @if($label ?? null)
                @include('components.inputs.partials.label')
            @endif

            <input
                type="{{ $type }}"
                id="{{ $name }}"
                name="{{ $name }}"
                value="{{ old($name, $value ?? '') }}"
                {{ ($required ?? false) ? 'required' : '' }}
                {{ $attributes->merge(['class' => 'form-control']) }}
                {{ $min ? "min={$min}" : '' }}
                {{ $max ? "max={$max}" : '' }}
                {{ $step ? "step={$step}" : '' }}
            >
        </div>
    </div>
    <div class="col-12">
        @error($name)
        @include('components.inputs.partials.error')
        @enderror
    </div>

</div>
