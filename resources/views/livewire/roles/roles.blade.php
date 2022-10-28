<div class="container">
    <div class="row">
        <div class="col-9 col-sm-6" wire:ignore>
            <x-inputs.text
                name="search"
                label="Search"
                wire:model.debounce.250ms="search"
            ></x-inputs.text>
        </div>
        <div class="col-2 col-sm-6">
            <button class="btn btn-primary my-3" type="button"
                    wire:click="newRole"
                    title="Add role">
                <i class="fa-solid fa-circle-plus fa-xl"></i>
            </button>
        </div>
    </div>
    <hr>

    <div class="row">
        @forelse($roles as $role)
            <div class="col-sm-3 mt-6">
                <div class="card" data-animation="true">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <a class="d-block blur-shadow-image text-role">
                            <h3>{!! $role->name !!}</h3>
                        </a>
                    </div>
                    <div class="card-body pt-2">
                        <div class="d-flex mt-n6 mx-auto">
                            <button class="btn btn-link text-primary ms-auto border-0"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Delete" wire:click="deleteRole({{ $role }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit"
                                    wire:click="editRole({{ $role }})"
                            >
                                <i class="material-icons text-lg">edit</i>
                            </button>
                        </div>
                    </div>
                    <div class="card-footer pt-0">
                        <div class="row">
                            <x-inputs.select
                                wire:key="{{ $role->id }}"
                                name="permissionsId.{{ $role->id }}"
                                label="{{ __('crud.roles.name') }}"
                                wire:model="permissionsId.{{ $role->id }}"
                            >
                                <option selected value="">Select career</option>
                                @foreach($permissions ?? [] as $permission)
                                    <option value="{{ $permission->id }}">{!! $permission->name !!}</option>
                                @endforeach
                            </x-inputs.select>
                            <button class="btn btn-dark" type="button" wire:click="addPermission({{ $role }})">
                                <i class="fa-solid fa-circle-plus fa-xl"></i>
                            </button>
                        </div>
                        <ol class="list-group list-group-numbered">
                            @forelse($role->permissions ?? [] as $permission)
                                <li class="text-sm list-group-item">
                                    {!! $permission->name !!}
                                    <i class="fa-solid fa-trash text-danger"
                                       wire:click="deletePermission({{ $role }},{{ $permission }})"></i>
                                </li>
                            @empty
                                <div class="text-center">
                                    @lang('crud.common.no_items_found')
                                </div>
                            @endforelse
                        </ol>
                    </div>

                </div>
            </div>
        @empty
            <div class="text-role display-6">
                @lang('crud.common.no_items_found')
            </div>
        @endforelse
        <div class="mt-4">
            {{ $roles->links() }}
        </div>
    </div>

    <x-modal wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button
                    type="button"
                    class="btn"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="modal-body">
                <x-inputs.text
                    name="role.name"
                    label="{{ __('crud.roles.inputs.name') }}"
                    wire:model.defer="role.name"
                ></x-inputs.text>
            </div>

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="fas fa-times"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="fas fa-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>
</div>
