<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserManagement extends Component
{
    public User $user;
    public $showingModal = false;

    public $modalTitle = '';

    public function showModal()
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal()
    {
        $this->showingModal = false;
    }


    public function newUser()
    {
        $this->modalTitle = trans('crud.form_fields.new_title');
        $this->showModal();
    }

    public function editField(User $user)
    {
        $this->modalTitle = trans('crud.form_fields.edit_title');
        $this->user = $user;

        $this->dispatchBrowserEvent('refresh');

        $this->showModal();
    }

    public function render()
    {
        return view('livewire.users.user-management');
    }
}
