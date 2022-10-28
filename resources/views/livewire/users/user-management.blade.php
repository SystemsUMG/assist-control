<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg p-2">
                        <div class="row">
                            <h4 class="text-white col-6 col-sm-8">
                                List of users
                            </h4>
                            <div class="col-6 col-sm-4 text-end">
                                <button class="btn bg-gradient-dark mb-0"
                                        data-bs-toggle="tooltip"
                                        title="Add New User"
                                        wire:click="newUser"
                                >
                                    <i class="fa-solid fa-user-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ID
                                </th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    PHOTO
                                </th>
                                <th
                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    NAME
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    EMAIL
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    ROLE
                                </th>
                                <th
                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    CREATION DATE
                                </th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                            <p class="mb-0 text-sm">1</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <div>
                                            <img src="{{ asset('assets') }}/img/team-2.jpg"
                                                 class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">John</h6>

                                    </div>
                                </td>
                                <td class="align-middle text-center text-sm">
                                    <p class="text-xs text-secondary mb-0">john@creative-tim.com
                                    </p>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">Admin</span>
                                </td>
                                <td class="align-middle text-center">
                                    <span class="text-secondary text-xs font-weight-bold">22/03/18</span>
                                </td>
                                <td class="align-middle">
                                    <a rel="tooltip" class="btn btn-success btn-link"
                                       href="" data-original-title=""
                                       title="">
                                        <i class="material-icons">edit</i>
                                        <div class="ripple-container"></div>
                                    </a>

                                    <button type="button" class="btn btn-danger btn-link"
                                            data-original-title="" title="">
                                        <i class="material-icons">close</i>
                                        <div class="ripple-container"></div>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
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
