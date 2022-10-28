<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{

    public User $user;

    protected function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email,' . $this->user->id,
            'user.phone' => 'required|max:10',
        ];
    }

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function updated($propertyName)
    {

        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->validate();

        $this->user->save();
        session()->flash('success', __('crud.students.successfully_edited_title'));
        $this->redirectRoute('user-profile');
    }

    public function render()
    {
        return view('livewire.users.user-profile');
    }

}
