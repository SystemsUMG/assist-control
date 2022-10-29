<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Career;
use App\Models\Center;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Dashboard extends Component
{
    use AuthorizesRequests;

    /**
     * @throws AuthorizationException
     */
    public function render(): Factory|View|Application
    {
        $totalCenters = Center::count();
        $totalCareers = Career::count();
        $totalTeachers = User::where('type', 'teacher')->count();
        $totalStudents = User::where('type', 'student')->count();
        $this->authorize('Dashboard', auth()->user());
        return view('livewire.dashboard.dashboard',[
            'totalCenters' => $totalCenters,
            'totalCareers' => $totalCareers,
            'totalTeachers' => $totalTeachers,
            'totalStudents' => $totalStudents
        ]);
    }
}
