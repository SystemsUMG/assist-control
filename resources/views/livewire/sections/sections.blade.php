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
                    wire:click="newSection"
                    title="Add center">
                <i class="fa-solid fa-circle-plus fa-xl"></i>
            </button>
        </div>
    </div>
    <hr>
    <div class="row">
        @forelse($courseSections ?? [] as $courseSection)
            <div class="col-sm-3 mt-6">
                <div class="card" data-animation="true">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <a class="d-block blur-shadow-image text-center">
                            <h3>{!! $courseSection->name !!}</h3>
                        </a>
                    </div>
                    <div class="card-body text-center">
                        <div class="d-flex mt-n6 mx-auto">
                            <button class="btn btn-link text-primary ms-auto border-0"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                    title="Delete" wire:click="deleteSection({{ $courseSection }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip"
                                    data-bs-placement="bottom" title="Edit"
                                    wire:click="editSection({{ $courseSection }})"
                            >
                                <i class="material-icons text-lg">edit</i>
                            </button>
                        </div>
                        <p class="mb-0">
                            {!! $courseSection->start_date ?? 'Empty' !!}
                        </p>
                        <p class="mb-0">
                            {!! $courseSection->end_date ?? 'Empty' !!}
                        </p>
                        <p class="mb-0">
                            {!! $courseSection->careerInCenter->center->name ?? 'Empty' !!} -
                            {!! $courseSection->careerInCenter->career->name ?? 'Empty' !!}
                        </p>
                        <p class="mb-0">
                            {!! $courseSection->user->name ?? 'Empty' !!}
                        </p>
                        <p class="mb-0">
                            {!! $courseSection->course->name ?? 'Empty' !!}
                        </p>
                        <p class="mb-0">
                            {!! $courseSection->semester->name ?? 'Empty' !!}
                        </p>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer">
                        <div class="row">
                            <x-inputs.select
                                wire:key="{{ $courseSection->id }}"
                                name="student_assignment.{{ $courseSection->id }}"
                                label="{{ __('crud.student_assignment.name') }}"
                                wire:model="student_assignment.{{ $courseSection->id }}"
                            >
                                <option selected value="">Select Student</option>
                                @foreach($students ?? [] as $student)
                                    <option
                                        value="{{ $student->id }}">{!! $student->name !!}
                                    </option>
                                @endforeach
                            </x-inputs.select>
                            <button class="btn btn-dark" type="button"
                                    wire:click="addStudentAssignment({{ $courseSection }})">
                                <i class="fa-solid fa-circle-plus fa-xl"></i>
                            </button>
                        </div>
                        <ol class="list-group list-group-numbered">
                            @forelse($courseSection->studentAssignment ?? [] as $studentAssignment)
                                <li class="text-sm">
                                    {!! $studentAssignment->user->name !!}
                                    <i class="fa-solid fa-trash text-danger"
                                       wire:click="deleteStudentAssignment({{ $studentAssignment->id }})"></i>
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
                    name="courseSection.name"
                    label="{{ __('crud.course_sections.inputs.name') }}"
                    wire:model.defer="courseSection.name"
                ></x-inputs.text>
                <x-inputs.text
                    name="courseSection.start_date"
                    label="{{ __('crud.course_sections.inputs.start_date') }}"
                    wire:model.defer="courseSection.start_date"
                ></x-inputs.text>
                <x-inputs.text
                    name="courseSection.end_date"
                    label="{{ __('crud.course_sections.inputs.end_date') }}"
                    wire:model.defer="courseSection.end_date"
                ></x-inputs.text>
                <x-inputs.select
                    name="courseSection.career_in_center_id"
                    label="{{ __('crud.course_sections.inputs.career_in_center_id') }}"
                    wire:model.defer="courseSection.career_in_center_id"
                >
                    <option selected value="">Select Center / Career</option>
                    @foreach($careerInCenters ?? [] as $careerInCenter)
                        <option
                            value="{{ $careerInCenter->id }}">
                            {!! $careerInCenter->center->name !!} - {!! $careerInCenter->career->name !!}
                        </option>
                    @endforeach
                </x-inputs.select>
                <x-inputs.select
                    name="courseSection.user_id"
                    label="{{ __('crud.course_sections.inputs.user_id') }}"
                    wire:model.defer="courseSection.user_id"
                >
                    <option selected value="">Select Teacher</option>
                    @foreach($teachers ?? [] as $teacher)
                        <option
                            value="{{ $teacher->id }}">
                            {!! $teacher->name !!}
                        </option>
                    @endforeach
                </x-inputs.select>
                <x-inputs.select
                    name="courseSection.course_id"
                    label="{{ __('crud.course_sections.inputs.course_id') }}"
                    wire:model.defer="courseSection.course_id"
                >
                    <option selected value="">Select Course</option>
                    @foreach($courses ?? [] as $course)
                        <option
                            value="{{ $course->id }}">
                            {!! $course->name !!}
                        </option>
                    @endforeach
                </x-inputs.select>
                <x-inputs.select
                    name="courseSection.semester_id"
                    label="{{ __('crud.course_sections.inputs.semester_id') }}"
                    wire:model.defer="courseSection.semester_id"
                >
                    <option selected value="">Select Semester</option>
                    @foreach($semesters ?? [] as $semester)
                        <option
                            value="{{ $semester->id }}">
                            {!! $semester->name !!}
                        </option>
                    @endforeach
                </x-inputs.select>
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
