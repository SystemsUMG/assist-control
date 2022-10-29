<div class="row">
    @forelse($data as $value)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{!! $value->courseSection->course->name !!}</h5>
                <p class="card-text">
                    Section: {!! $value->courseSection->name !!}
                </p>
                <p class="card-text">
                    Horario: {!! $value->courseSection->start_date !!} to {!! $value->courseSection->end_date !!}
                </p>
                <button class="btn btn-primary" wire:click="newAssistance({{ $value }})">Fill attendance</button>
            </div>
        </div>
    @empty
    @endforelse
</div>
<hr>

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
            @if(!$outOfTime)
                <x-inputs.text
                    name="assistance.topic_seen"
                    label="assistance.topic_seen"
                    wire:model="assistance.topic_seen"
                ></x-inputs.text>
            @else
                <x-inputs.text
                    name="assistance.justification"
                    label="assistance.justification"
                    wire:model="assistance.justification"
                ></x-inputs.text>
            @endif
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
