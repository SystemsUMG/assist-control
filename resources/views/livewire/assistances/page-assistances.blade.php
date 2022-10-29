<div class="row">
    @forelse($data as $value)
        <div class="card col-12 col-sm-4">
            <div class="card-body">
                <h5 class="card-title">{!! $value->course->name !!}</h5>
                <p class="card-text">
                    Section: {!! $value->name !!}
                </p>
                <p class="card-text">
                    Horario: {!! $value->start_date !!} to {!! $value->end_date !!}
                </p>
                <button class="btn btn-primary" wire:click="showAssistances({{ $value }})">Show Assistances</button>
            </div>
        </div>
    @empty
        <div class="text-center">
            @lang('crud.common.no_items_found')
        </div>
    @endforelse
</div>

<x-modal wire:model="showingAssistanceModal">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Assistances</h5>
            <button
                type="button"
                class="btn"
                wire:click="$toggle('showingAssistanceModal')"
            >
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <ol class="list-group list-group-numbered">
                @forelse($studentAssignments ?? [] as $studentAssignment)
                    <li class="text-sm list-group-item">
                        {!! $studentAssignment->user->name !!}
                        <ul>
                            @forelse($studentAssignment->assistances as $assistance)
                                @if($assistance->out_of_time)
                                    <li class="text-danger">
                                        {{$assistance->justification}} -
                                        {{$assistance->created_at}}
                                    </li>
                                @else
                                    <li class="text-success">
                                        {{$assistance->topic_seen}} -
                                        {{$assistance->created_at}}
                                    </li>
                                @endif
                            @empty
                                <div class="text-center">
                                    @lang('crud.common.no_items_found')
                                </div>
                            @endforelse
                        </ul>
                    </li>
                @empty
                    <div class="text-center">
                        @lang('crud.common.no_items_found')
                    </div>
                @endforelse
            </ol>
        </div>
        <div class="modal-footer">
            <button
                type="button"
                class="btn btn-light float-left"
                wire:click="$toggle('showingAssistanceModal')"
            >
                <i class="fas fa-times"></i>
                @lang('crud.common.cancel')
            </button>
        </div>
    </div>
</x-modal>
