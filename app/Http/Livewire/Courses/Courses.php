<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Courses extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    use AuthorizesRequests;

    /**
     * @throws AuthorizationException
     */

    public Course $course;

    public $search = '';

    public $showingModal = false;
    public $modalTitle = '';

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    protected function rules()
    {
        return [
            'course.name' => ['required', 'string'],
            'course.description' => ['nullable', 'string'],
        ];
    }

    public function newCourse()
    {
        $this->modalTitle = trans('crud.courses.create_title');
        $this->course = new Course();
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function editCourse(Course $course)
    {
        $this->modalTitle = trans('crud.courses.edit_title');
        $this->course = $course;

        $this->showingModal = true;
    }

    public function deleteCourse(Course $course)
    {
        $course->delete();
    }

    public function save()
    {
        $this->validate();
        $this->course->save();
        $this->showingModal = false;
    }


    public function render()
    {
        $this->authorize('List courses');
        $courses = Course::where('name', 'like', "%{$this->search}%")->paginate(8);
        return view('livewire.courses.courses', [
            'courses' => $courses
        ]);
    }
}
