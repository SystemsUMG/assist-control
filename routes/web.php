<?php

use App\Http\Controllers\SocialAuthGoogleController;
use App\Http\Controllers\ReportController;
use App\Http\Livewire\Assistances\Assistances;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Careers\Careers;
use App\Http\Livewire\Centers\Centers;
use App\Http\Livewire\Courses\Courses;
use App\Http\Livewire\Dashboard\Dashboard;
use App\Http\Livewire\NoAssignment\NoAssignment;
use App\Http\Livewire\Permissions\Permissions;
use App\Http\Livewire\Roles\Roles;
use App\Http\Livewire\Sections\Sections;
use App\Http\Livewire\Semesters\Semesters;
use App\Http\Livewire\Students\Students;
use App\Http\Livewire\Teachers\Teachers;
use App\Http\Livewire\Users\UserProfile;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('sign-in');
});

Route::get('sign-in', Login::class)->middleware('guest')->name('login');
Route::get('login-google', [SocialAuthGoogleController::class, 'redirect'])->name('login.google');
Route::get('google-callback', [SocialAuthGoogleController::class, 'callback'])->name('login.callback');

Route::group(['middleware' => 'auth'], function () {
    Route::get('no-assignment', NoAssignment::class)->name('no-assignment');
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('user-profile', UserProfile::class)->name('user-profile');
    Route::get('roles', Roles::class)->name('roles');
    Route::get('permissions', Permissions::class)->name('permissions');

    //pages

    Route::get('centers', Centers::class)->name("centers");
    Route::get('careers', Careers::class)->name("careers");
    Route::get('courses', Courses::class)->name("courses");
    Route::get('semesters', Semesters::class)->name("semesters");
    Route::get('students', Students::class)->name("students");
    Route::get('teachers', Teachers::class)->name("teachers");
    Route::get('sections', Sections::class)->name("sections");
    Route::get('assistances', Assistances::class)->name("assistances");

    Route::get('report-student', [ReportController::class, 'student'])->name("report-student");
});
