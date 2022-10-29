<?php

namespace App\Http\Livewire\Centers;

use App\Models\Career;
use App\Models\CareerInCenters;
use App\Models\Center;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @property Collection $careers
 */
class Centers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    use AuthorizesRequests;


    /**
     * @throws AuthorizationException
     */

    public Center $center;

    public $search = '';

    //centers
    public $showingModal = false;
    public $modalTitle = '';

    //careerInCenters
    public $career_id;
    public $newCareerInCenter;

    public function mount(Center $center)
    {
        $this->center = $center;
        $this->careers = Career::get();
    }

    protected function rules()
    {
        return [
            'center.name' => ['required', 'string'],
            'center.description' => ['nullable', 'string'],
            'career_id.*' => ['required']
        ];
    }

    public function newCenter()
    {
        $this->modalTitle = trans('crud.centers.create_title');
        $this->center = new Center();
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function editCenter(Center $center)
    {
        $this->modalTitle = trans('crud.centers.edit_title');
        $this->center = $center;

        $this->showingModal = true;
    }

    public function deleteCenter(Center $center)
    {
        $center->careerInCenters->each->delete();
        $center->delete();
    }

    public function save()
    {
        $this->validate();
        $this->center->save();
        $this->showingModal = false;
    }

    public function addCareerInCenter($career)
    {
        if ($this->career_id) {
            $firstKey = reset($this->career_id);
            $this->newCareerInCenter = new CareerInCenters();
            $this->newCareerInCenter->career_code = rand(1000, 9999);
            $this->newCareerInCenter->center_id = $career['id'];
            $this->newCareerInCenter->career_id = intval($firstKey);
            $this->newCareerInCenter->save();

            $this->career_id = [];
        }
    }

    public function deleteCareerInCenter($id)
    {
        CareerInCenters::find($id)->delete();
    }

    public function render(): Factory|View|Application
    {
        $this->authorize('List Centers');
        $centers = Center::where('name', 'like', "%{$this->search}%")->paginate(4);
        return view('livewire.centers.centers', [
            'centers' => $centers
        ]);
    }
}
