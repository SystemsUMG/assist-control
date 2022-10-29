<?php

namespace App\Http\Livewire\Sections;

use App\Models\CareerInCenters;
use App\Models\Course;
use App\Models\CourseSection;
use App\Models\Semester;
use App\Models\StudentAssignment;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @property $studentAssignment
 * @property $students
 * @property $studentAssignments
 * @property $teachers
 * @property $careerInCenters
 * @property $courses
 * @property $semesters
 */
class Sections extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public CourseSection $courseSection;

    public $search = '';

    public $showingModal = false;
    public $modalTitle = '';

    public $student_assignment;
    public $newStudentAssignment;

    public function mount(CourseSection $courseSection)
    {
        $this->courseSection = $courseSection;
        $this->careerInCenters = CareerInCenters::get();
        $this->students = User::where('type', 'student')->get();
        $this->teachers = User::where('type', 'teacher')->get();
        $this->courses = Course::get();
        $this->semesters = Semester::get();
    }

    protected function rules(): array
    {
        return [
            'courseSection.name' => ['required'],
            'courseSection.start_date' => ['required'],
            'courseSection.end_date' => ['required'],
            'courseSection.career_in_center_id' => ['required'],
            'courseSection.user_id' => ['required'],
            'courseSection.course_id' => ['required'],
            'courseSection.semester_id' => ['required'],
        ];
    }

    public function newSection()
    {
        $this->modalTitle = trans('crud.course_sections.create_title');
        $this->courseSection = new CourseSection();
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function editSection(CourseSection $courseSection)
    {
        $this->modalTitle = trans('crud.course_sections.edit_title');
        $this->courseSection = $courseSection;
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function deleteSection(CourseSection $courseSection)
    {
        if ($courseSection->studentAssignment->count() > 0) {
            $courseSection->studentAssignment->each->delete();
        }
        $courseSection->delete();
    }

    public function save()
    {
        $this->validate();
        $this->courseSection->save();
        $this->showingModal = false;
    }

    public function addStudentAssignment($courseSection)
    {
        if ($this->student_assignment) {
            $firstKey = reset($this->student_assignment);
            $this->newStudentAssignment = new StudentAssignment;
            $this->newStudentAssignment->user_id = $firstKey;
            $this->newStudentAssignment->course_section_id = $courseSection['id'];
            $this->newStudentAssignment->save();

            $this->student_assignment = [];
        }
    }

    public function deleteStudentAssignment($id)
    {
        StudentAssignment::find($id)->delete();
    }

    public function render(): Factory|View|Application
    {
        $courseSections = CourseSection::where('name', 'like', "%{$this->search}%")->paginate(4);
        return view('livewire.sections.sections', [
            'courseSections' => $courseSections
        ]);
    }
}
