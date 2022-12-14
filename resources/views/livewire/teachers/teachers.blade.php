<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="px-3">
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
                                    wire:click="newTeacher"
                                    title="Add teacher">
                                <i class="fa-solid fa-user-plus fa-xl"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('crud.teachers.name') }}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('crud.teachers.inputs.tuition') }}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('crud.teachers.inputs.phone') }}
                                </th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    {{ __('crud.teachers.inputs.status') }}
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($teachers as $teacher)
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="{!! $teacher->google_avatar !!}"
                                                     class="avatar avatar-sm me-3 border-radius-lg"
                                                     alt="{!! $teacher->id !!}">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{!! $teacher->name !!}</h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    {!! $teacher->email !!}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            {!! $teacher->tuition !!}
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            {!! $teacher->phone ?? 'None' !!}
                                        </span>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        @if ($teacher->status)
                                            <button class="btn m-0 badge badge-sm bg-gradient-success"
                                                    wire:click="status({{ $teacher }})"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('crud.teachers.disabled_user') }}">
                                                Enabled
                                            </button>
                                        @else
                                            <button class="btn m-0 badge badge-sm bg-gradient-danger"
                                                    wire:click="status({{ $teacher }})"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('crud.teachers.enabled_user') }}">
                                                Disabled
                                            </button>
                                        @endif
                                    </td>
                                    <td class="align-middle">
                                        <button class="btn pt-1 m-0" wire:click="editStudent({{ $teacher }})"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="{{ __('crud.teachers.edit_title') }}">
                                            <i class="fa-solid fa-user-pen text-info fa-2xl"></i>
                                        </button>
                                        <button class="btn pt-1 m-0" wire:click="deleteStudent({{ $teacher }})"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="{{ __('crud.teachers.delete_title') }}">
                                            <i class="fa-solid fa-user-xmark text-danger fa-2xl"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center display-6">
                                        @lang('crud.common.no_items_found')
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $teachers->links() }}
                        </div>
                    </div>
                </div>
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
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="javascript:;"
                               role="tab" aria-selected="true" wire:click="createView()">
                                <i class="fa-solid fa-circle-plus"></i>
                                <span class="ms-1">Create Teacher</span>
                            </a>
                        </li>
                        @if (!$editing)
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;"
                                   role="tab" aria-selected="false" wire:click="assignView()">
                                    <i class="fa-solid fa-user-check"></i>
                                    <span class="ms-1">To Assign</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
                @include("livewire.teachers.$view")
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
