<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Career;
use App\Models\Center;
use App\Models\Course;
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
        $careers = Career::get();
        $courses = Course::get();
        $totalCareers = $careers->count();
        $totalTeachers = User::where('type', 'teacher')->count();
        $students = User::where('type', 'student')->get();
        $totalStudents = User::where('type', 'student')->count();
        $this->authorize('Dashboard', auth()->user());
        return view('livewire.dashboard.dashboard',[
            'totalCenters' => $totalCenters,
            'careers' => $careers,
            'courses' => $courses,
            'totalCareers' => $totalCareers,
            'totalTeachers' => $totalTeachers,
            'students' => $students,
            'totalStudents' => $totalStudents,
        ]);
    }
}
