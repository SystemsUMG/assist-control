<?php

namespace App\Http\Livewire\Semesters;

use App\Models\Semester;
use Livewire\Component;
use Livewire\WithPagination;

class Semesters extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public Semester $semester;

    public $search = '';

    public $showingModal = false;
    public $modalTitle = '';

    public function mount(Semester $semester)
    {
        $this->semester = $semester;
    }

    protected function rules()
    {
        return [
            'semester.name' => ['required', 'string'],
            'semester.number' => ['required', 'integer'],
            'semester.year' => ['required', 'string'],
        ];
    }

    public function newSemester()
    {
        $this->modalTitle = trans('crud.semesters.create_title');
        $this->semester = new Semester();
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function editSemester(Semester $semester)
    {
        $this->modalTitle = trans('crud.semesters.edit_title');
        $this->semester = $semester;
        $this->showingModal = true;
    }

    public function deleteSemester(Semester $semester)
    {
        $semester->delete();
    }

    public function save()
    {
        $this->validate();
        $this->semester->save();
        $this->showingModal = false;
    }


    public function render()
    {
        $semesters = Semester::where('name', 'like', "%{$this->search}%")->paginate(8);
        return view('livewire.semesters.semesters', [
            'semesters' => $semesters
        ]);
    }
}
