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
                    wire:click="newSemester"
                    title="Add semester">
                <i class="fa-solid fa-circle-plus fa-xl"></i>
            </button>
        </div>
    </div>
    <hr>
    <div class="row">
        @forelse($semesters as $semester)
            <div class="col-sm-3 mt-6">
                <div class="card" data-animation="true">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <a class="d-block blur-shadow-image text-center">
                            <h4>{!! $semester->name !!}</h4>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <div class="d-flex mt-n6 mx-auto">
                            <button class="btn btn-link text-primary ms-auto border-0"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Delete" wire:click="deleteSemester({{ $semester }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit"
                                    wire:click="editSemester({{ $semester }})"
                            >
                                <i class="material-icons text-lg">edit</i>
                            </button>
                        </div>
                        <p class="mb-0">
                            {!! $semester->number ?? 'Empty' !!} - {!! $semester->year ?? 'Empty' !!}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center display-6">
                @lang('crud.common.no_items_found')
            </div>
        @endforelse
        <div class="mt-4">
            {{ $semesters->links() }}
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
                    name="semester.name"
                    label="{{ __('crud.semesters.inputs.name') }}"
                    wire:model.defer="semester.name"
                ></x-inputs.text>
                <x-inputs.number
                    name="semester.number"
                    label="{{ __('crud.semesters.inputs.number') }}"
                    wire:model.defer="semester.number"
                ></x-inputs.number>
                <x-inputs.text
                    name="semester.year"
                    label="{{ __('crud.semesters.inputs.year') }}"
                    wire:model.defer="semester.year"
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
