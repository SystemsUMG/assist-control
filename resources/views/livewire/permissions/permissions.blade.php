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
                    wire:click="newPermission"
                    title="{{ __('crud.permissions.create_title') }}">
                <i class="fa-solid fa-circle-plus fa-xl"></i>
            </button>
        </div>
    </div>
    <hr>
    <div class="card">
        <div class="card-body">
            <div class="row">
                @forelse($permissions as $permission)
                    <div class="col-sm-3">
                        <div class="border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fa-solid fa-key fa-2xl"></i>
                                </div>
                                <div class="col-7">
                                    <p class="mb-1">{!! $permission->name !!}</p>
                                </div>
                                <div class="col-3">
                                    <div class="btn-group m-0 p-0" role="group" aria-label="Basic mixed styles example">
                                        <button type="button" class="btn m-0 p-1" wire:click="deletePermission({{ $permission }})">
                                            <i class="fa-solid fa-trash text-danger fa-xl"></i>
                                        </button>
                                        <button type="button" class="btn m-0 p-1" wire:click="editPermission({{ $permission }})">
                                            <i class="fa-solid fa-pen-to-square text-dark fa-xl"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center">
                        @lang('crud.common.no_items_found')
                    </div>
                @endforelse
                {{ $permissions->links() }}
            </div>
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
                    name="permission.name"
                    label="{{ __('crud.permissions.inputs.name') }}"
                    wire:model.defer="permission.name"
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
