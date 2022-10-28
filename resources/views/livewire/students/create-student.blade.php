<div class="form-control">
    <x-inputs.text
        name="user.name"
        label="Name"
        wire:model.defer="user.name"
    ></x-inputs.text>
    <x-inputs.email
        name="user.email"
        label="Email"
        wire:model.defer="user.email"
    ></x-inputs.email>
    <x-inputs.text
        name="user.phone"
        label="Phone"
        wire:model.defer="user.phone"
    ></x-inputs.text>
    <x-inputs.select
        name="user.career_in_center_id"
        label="Career"
        wire:model.defer="user.career_in_center_id"
    >
        <option value="">Select center</option>
        @forelse($careerInCenters as $careerInCenter)
            <option value="{{ $careerInCenter->id }}">
                {{$careerInCenter->career_code}} - {{$careerInCenter->center->name}}, {{$careerInCenter->career->name}}
            </option>
        @empty
            <option value="">No centers</option>
        @endforelse
    </x-inputs.select>
</div>
