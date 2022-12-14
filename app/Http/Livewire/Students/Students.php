<?php

namespace App\Http\Livewire\Students;

use App\Models\CareerInCenters;
use App\Models\Center;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @property Collection $careerInCenters
 * @property $students
 * @property string $modalTitle
 * @property $users
 * @property string $view
 * @property $centers
 */
class Students extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    use AuthorizesRequests;

    /**
     * @throws AuthorizationException
     */

    public $search = '';

    public $editing = false;
    public $modalTitle = '';
    public $view = 'create-student';
    public $showingModal = false;
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;

        $this->users = User::where('type', 'general')->get();
        $this->careerInCenters = CareerInCenters::get();
    }

    protected function rules(): array
    {
        return [
            'user.name' => [Rule::when($this->view == 'create-student', ['required'])],
            'user.email' => [Rule::when($this->view == 'create-student', ['required', 'email'])],
            'user.phone' => ['nullable', 'numeric'],
            'user.career_in_center_id' => ['required', 'exists:career_in_centers,id'],
            'user.id' => [Rule::when($this->view == 'assign-student', ['required'])],
        ];
    }

    public function newStudent()
    {
        $this->editing = false;
        $this->resetErrorBag();
        $this->user = new User;
        $this->showingModal = true;
        $this->modalTitle = 'Create Student';
    }

    public function createView()
    {
        $this->resetErrorBag();
        $this->view = 'create-student';
        $this->modalTitle = 'Create Student';
    }

    public function assignView()
    {
        $this->resetErrorBag();
        $this->view = 'assign-student';
        $this->modalTitle = 'Assign Student';
    }

    public function editStudent(User $user)
    {
        $this->editing = true;
        $this->modalTitle = 'Update Student';
        $this->user = $user;
        $this->showingModal = true;
    }

    public function save()
    {
        $this->validate();
        $this->user->tuition = rand(1000, 9999);
        $this->user->status = 1;
        $this->user->type = 'student';
        if ($this->user->id) {
            $user = User::find($this->user->id);
            $user->tuition = $this->user->tuition;
            $user->status = $this->user->status;
            $user->type = $this->user->type;
            $user->career_in_center_id = $this->user->career_in_center_id;
            $user->save();
            $user->syncRoles('student');
            session()->flash('success', __('crud.students.successfully_edited_title'));
        } else {
            $this->user->save();
            $this->user->syncRoles('student');
            session()->flash('success', __('crud.students.successfully_created_title'));
        }

        $this->showingModal = false;
        $this->redirectRoute('students');
    }

    public function deleteStudent(User $user)
    {
        if ($user->studentAssignment->count() > 0) {
            session()->flash('error', __('It cannot be deleted, there is data that depends on this.'));
            $this->redirectRoute('students');
        } else {
            $user->studentAssignment->each->delete();
            $user->delete();
            session()->flash('success', __('crud.students.successfully_delete_title'));
            $this->redirectRoute('students');
        }
    }

    public function status(User $user)
    {
        if ($user->status) {
            $user->status = 0;
            session()->flash('success', __('crud.students.disabled_user'));
        } else {
            $user->status = 1;
            session()->flash('success', __('crud.students.enabled_user'));
        }

        $user->save();
        $this->redirectRoute('students');
    }

    public function render(): Factory|View|Application
    {
        $this->authorize('List students');
        $students = User::where('name', 'like', "%{$this->search}%")
            ->where('type', 'student')
            ->paginate(10);
        return view('livewire.students.students', [
            'students' => $students
        ]);
    }
}
