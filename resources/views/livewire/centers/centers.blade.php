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
                    wire:click="newCenter"
                    title="Add center">
                <i class="fa-solid fa-circle-plus fa-xl"></i>
            </button>
        </div>
    </div>
    <hr>
    <div class="row">
        @forelse($centers as $center)
            <div class="col-sm-3 mt-6">
                <div class="card" data-animation="true">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <a class="d-block blur-shadow-image text-center">
                            <h3>{!! $center->name !!}</h3>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <div class="d-flex mt-n6 mx-auto">
                            <button class="btn btn-link text-primary ms-auto border-0"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Delete" wire:click="deleteCenter({{ $center }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit"
                                    wire:click="editCenter({{ $center }})"
                            >
                                <i class="material-icons text-lg">edit</i>
                            </button>
                        </div>
                        <p class="mb-0">
                            {!! $center->description ?? 'Empty' !!}
                        </p>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer">
                        <div class="row">
                            <x-inputs.select
                                wire:key="{{ $center->id }}"
                                name="career_id.{{ $center->id }}"
                                label="{{ __('crud.careers.name') }}"
                                wire:model="career_id.{{ $center->id }}"
                            >
                                <option selected value="">Select career</option>
                                @foreach($careers ?? [] as $career)
                                    <option value="{{ $career->id }}">{!! $career->name !!}</option>
                                @endforeach
                            </x-inputs.select>
                            <button class="btn btn-dark" type="button" wire:click="addCareerInCenter({{ $center }})">
                                <i class="fa-solid fa-circle-plus fa-xl"></i>
                            </button>
                        </div>
                        <ol class="ps-2">
                            @forelse($center->careerInCenters ?? [] as $careerInCenters)
                                <li class="text-sm">
                                    {!! $careerInCenters->career_code !!} -
                                    {!! $careerInCenters->career->name !!}
                                    <i class="fa-solid fa-trash text-danger"
                                       wire:click="deleteCareerInCenter({{ $careerInCenters->id }})"></i>
                                    <a href="{{ route('semesters')  }}">
                                        <i class="fa-solid fa-arrow-right text-dark"></i>
                                    </a>
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
            <div class="text-center display-6">
                @lang('crud.common.no_items_found')
            </div>
        @endforelse
        <div class="mt-4">
            {{ $centers->links() }}
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
                    name="center.name"
                    label="{{ __('crud.centers.inputs.name') }}"
                    wire:model.defer="center.name"
                ></x-inputs.text>
                <x-inputs.text
                    name="center.description"
                    label="{{ __('crud.centers.inputs.description') }}"
                    wire:model.defer="center.description"
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
