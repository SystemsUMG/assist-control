<div class="form-control">
    <x-inputs.select
        name="user.id"
        label="Users"
        wire:model.defer="user.id"
    >
        <option value="">Select user</option>
        @forelse($users as $user)
            <option value="{{ $user->id }}">{{$user->name}}</option>
        @empty
            <option value="">No users</option>
        @endforelse
    </x-inputs.select>
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
