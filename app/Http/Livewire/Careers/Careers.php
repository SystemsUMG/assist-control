<?php

namespace App\Http\Livewire\Careers;

use App\Models\Career;
use Livewire\Component;
use Livewire\WithPagination;

class Careers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public Career $career;

    public $search = '';

    public $showingModal = false;
    public $modalTitle = '';

    public function mount(Career $career)
    {
        $this->career = $career;
    }

    protected function rules()
    {
        return [
            'career.name' => ['required', 'string'],
            'career.description' => ['nullable', 'string'],
        ];
    }

    public function newCareer()
    {
        $this->modalTitle = trans('crud.careers.create_title');
        $this->career = new Career();
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function editCareer(Career $career)
    {
        $this->modalTitle = trans('crud.careers.edit_title');
        $this->career = $career;

        $this->showingModal = true;
    }

    public function deleteCareer(Career $career)
    {
        $career->delete();
    }

    public function save()
    {
        $this->validate();
        $this->career->save();
        $this->showingModal = false;
    }


    public function render()
    {
        $careers = Career::where('name', 'like', "%{$this->search}%")->paginate(8);
        return view('livewire.careers.careers', [
            'careers' => $careers
        ]);
    }
}
