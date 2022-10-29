<div class="form-control">
    <x-inputs.text
        name="user.name"
        label="{{ __('crud.students.inputs.name') }}"
        wire:model.defer="user.name"
    ></x-inputs.text>
    <x-inputs.email
        name="user.email"
        label="{{ __('crud.students.inputs.email') }}"
        wire:model.defer="user.email"
    ></x-inputs.email>
    <x-inputs.text
        name="user.phone"
        label="{{ __('crud.students.inputs.phone') }}"
        wire:model.defer="user.phone"
    ></x-inputs.text>
</div>
