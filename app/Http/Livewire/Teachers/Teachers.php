<?php

namespace App\Http\Livewire\Teachers;

use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @property $users
 */
class Teachers extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    use AuthorizesRequests;

    /**
     * @throws AuthorizationException
     */


    public $search;

    public $editing = false;
    public $modalTitle = '';
    public $view = 'create-teacher';
    public $showingModal = false;
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->users = User::where('type', 'general')->get();
    }

    protected function rules()
    {
        return [
            'user.name' => [Rule::when($this->view == 'create-teacher', ['required'])],
            'user.email' => [Rule::when($this->view == 'create-teacher', ['required', 'email'])],
            'user.phone' => ['nullable', 'numeric'],
            'user.id' => [Rule::when($this->view == 'assign-teacher', ['required'])],
        ];
    }

    public function newTeacher()
    {
        $this->editing = false;
        $this->resetErrorBag();
        $this->user = new User;
        $this->showingModal = true;
        $this->modalTitle = 'Create Teacher';
    }

    public function createView()
    {
        $this->resetErrorBag();
        $this->view = 'create-teacher';
        $this->modalTitle = 'Create Teacher';
    }

    public function assignView()
    {
        $this->resetErrorBag();
        $this->view = 'assign-teacher';
        $this->modalTitle = 'Assign Teacher';
    }

    public function save()
    {
        $this->validate();
        $this->user->tuition = rand(1000, 9999);
        $this->user->status = 1;
        $this->user->type = 'teacher';
        if ($this->user->id) {
            $user = User::find($this->user->id);
            $user->tuition = $this->user->tuition;
            $user->status = $this->user->status;
            $user->type = $this->user->type;
            $user->save();
            $user->syncRoles('teacher');
            session()->flash('success', __('crud.teachers.successfully_edited_title'));
        } else {
            $this->user->save();
            $this->user->syncRoles('teacher');
            session()->flash('success', __('crud.teachers.successfully_created_title'));
        }

        $this->showingModal = false;
        $this->redirectRoute('teachers');
    }

    public function deleteStudent(User $user)
    {
        $user->delete();
        session()->flash('success', __('crud.teachers.successfully_delete_title'));
        $this->redirectRoute('teachers');
    }

    public function status(User $user)
    {
        if ($user->status) {
            $user->status = 0;
            session()->flash('success', __('crud.teachers.disabled_user'));
        } else {
            $user->status = 1;
            session()->flash('success', __('crud.teachers.enabled_user'));
        }

        $user->save();
        $this->redirectRoute('teachers');
    }

    public function render(): Factory|View|Application
    {
        $this->authorize('List teachers');
        $teachers = User::where('name', 'like', "%{$this->search}%")
            ->where('type', 'teacher')
            ->paginate(10);
        return view('livewire.teachers.teachers', [
            'teachers' => $teachers
        ]);
    }
}
