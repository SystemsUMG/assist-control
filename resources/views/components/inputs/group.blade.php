@props([
    'field' => '',
    'for'
])

<div {{ $attributes->merge([
    'class' => strval($field) > 0 ? 'input-group input-group-outline mt-3 is-filled' : 'input-group input-group-outline mt-3'])
    }}>
    {{ $slot }}
</div>
@error($for)
@include('components.inputs.partials.error')
@enderror
