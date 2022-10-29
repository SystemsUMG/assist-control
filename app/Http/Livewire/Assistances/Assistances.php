<?php

namespace App\Http\Livewire\Assistances;

use App\Models\Assistance;
use App\Models\CourseSection;
use App\Models\StudentAssignment;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Assistances extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    /**
     * @throws AuthorizationException
     */

    public $view = '';

    public Assistance $assistance;

    public $showingModal = false;
    public $showingAssistanceModal = false;
    public $modalTitle = '';
    public $newAssistance;
    public $outOfTime;

    public function mount(Assistance $assistance)
    {
        $this->assistance = $assistance;
        $this->view = match (auth()->user()->type) {
            'admin', 'teacher' => 'page-assistances',
            default => 'page-students',
        };
    }

    protected function rules()
    {
        return [
            'assistance.topic_seen' => ['nullable'],
            'assistance.justification' => ['nullable'],
        ];
    }

    public function newAssistance(StudentAssignment $studentAssignment)
    {
        $this->newAssistance = $studentAssignment;
        if (\Carbon\Carbon::now()->setTimezone('America/Guatemala')->format('h:i') >= $this->newAssistance->courseSection->start_date
            && \Carbon\Carbon::now()->setTimezone('America/Guatemala') <= $this->newAssistance->courseSection->end_date) {
            $this->outOfTime = false;
        } else {
            $this->outOfTime = true;
        }
        $this->modalTitle = trans('crud.assistances.create_title');
        $this->assistance = new Assistance();
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function showAssistances(CourseSection $courseSection)
    {
        $this->showingAssistanceModal = true;
        $this->studentAssignments = $courseSection->studentAssignment;
    }

    public function save()
    {
        $this->validate();
        if ($this->outOfTime) {
            $this->assistance->topic_seen = '-';
            $this->assistance->out_of_time = 1;
        } else {
            $this->assistance->justification = '-';
            $this->assistance->out_of_time = 0;
        }
        $this->assistance->student_assignment_id = $this->newAssistance->id;
        $this->assistance->save();
        $this->showingModal = false;
    }

    public function render()
    {
        $this->authorize('List assistances');

        if ($this->view == "page-students") {
            $data = StudentAssignment::where('user_id', auth()->user()->id)->get();
        } else {
            $data = CourseSection::where('user_id', auth()->user()->id)->paginate(4);
        }
        return view('livewire.assistances.assistances', [
            'data' => $data
        ]);
    }
}
