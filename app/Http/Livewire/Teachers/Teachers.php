<?php

namespace App\Http\Livewire\Teachers;

use App\Models\User;
use Livewire\Component;

class Teachers extends Component
{
    public $search;

    public function render()
    {
        $teachers = User::where('name', 'like', "%{$this->search}%")
            ->where('type', 'teacher')
            ->paginate(10);
        return view('livewire.teachers.teachers', [
            'teachers' => $teachers
        ]);
    }
}
