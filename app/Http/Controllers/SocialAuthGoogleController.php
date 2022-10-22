<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthGoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $existUser = User::where('email', $googleUser->email)->first();

            if ($existUser) {
                $existUser->update([
                    'google_id' => $googleUser->id,
                    'google_avatar' => $googleUser->avatar,
                ]);
                Auth::loginUsingId($existUser->id);
            } else {
                $user = new User;
                $user->name = $googleUser->name;
                $user->email = $googleUser->email;
                $user->google_id = $googleUser->id;
                $user->google_avatar = $googleUser->id;
                $user->status = 1;
                $user->type = 'general';
                $user->save();
                Auth::loginUsingId($user->id);
            }
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return $e;
        }
    }
}
