<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
         style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask  bg-gradient-primary  opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{ auth()->user()->google_avatar }}" alt="profile_image"
                         class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ auth()->user()->name }}
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        {{ auth()->user()->type }}
                    </p>
                </div>
            </div>
        </div>
        <div class="card card-plain h-100">
            <div class="card-header pb-0 p-3">
                <div class="row">
                    <div class="col-md-8 d-flex align-items-center">
                        <h6 class="mb-3">Profile Information</h6>
                    </div>
                </div>
            </div>
            <div class="card-body p-3">
                <form wire:submit.prevent='update'>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('crud.students.inputs.tuition') }}</label>
                            <input type="text" disabled
                                   value="{!! $user->careerInCenter->career_code ?? '0000'.'-'.$user->created_at->format('Y').'-'.$user->tuition !!}"
                                   class="form-control border border-2 p-2">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('crud.students.inputs.name') }}</label>
                            <input wire:model.lazy="user.name" type="text" class="form-control border border-2 p-2">
                            @error('user.name')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('crud.students.inputs.email') }}</label>
                            <input wire:model.lazy="user.email" type="email" class="form-control border border-2 p-2">
                            @error('user.email')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>

                        <div class="mb-3 col-md-6">
                            <label class="form-label">{{ __('crud.students.inputs.phone') }}</label>
                            <input wire:model.lazy="user.phone" type="text" class="form-control border border-2 p-2">
                            @error('user.phone')
                            <p class='text-danger inputerror'>{{ $message }} </p>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn bg-gradient-dark">{{ __('crud.common.save') }}</button>
                </form>

            </div>
        </div>


    </div>

</div>
