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
</div>
