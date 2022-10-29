<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Dashboard extends Component
{
    use AuthorizesRequests;

    public function render(): Factory|View|Application
    {
        $this->authorize('Dashboard', auth()->user());
        return view('livewire.dashboard');
    }
}
