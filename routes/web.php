<?php

use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\ResetPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ExampleLaravel\UserProfile;
use App\Http\Livewire\Notifications;
use App\Http\Controllers\SocialAuthGoogleController;

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
Route::get('/login-google', [SocialAuthGoogleController::class, 'redirect'])->name('login.google');
Route::get('/google-callback', [SocialAuthGoogleController::class, 'callback'])->name('login.callback');

Route::group(['middleware' => 'auth'], function () {
    Route::get('user-profile', UserProfile::class)->name('user.profile');

    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('notifications', Notifications::class)->name("notifications");
});
