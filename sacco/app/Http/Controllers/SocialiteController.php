<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            
            // You can access user details like $user->getId(), $user->getName(), etc.
            dd($user);
            
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}


// try {
        //     DB::beginTransaction();

        //     $user = Socialite::driver('google')->user();
        //     $existingUser = User::where('social_id', $user->id)->first();

        //     if ($existingUser) {
        //         Auth::login($existingUser);
        //     } else {
        //         $newUser = User::create([
        //             'name' => $user->name ?? 'Google User',
        //             'email' => $user->email ?? '',
        //             'social_id' => $user->id,
        //             'social_type' => 'google',
        //             'password' => null,
        //         ]);

        //         Auth::login($newUser);
        //     }

        //     DB::commit();

        //     return redirect('admin/dashboard'); // Redirect to the dashboard route
        // } catch (Exception $e) {
        //     DB::rollback();

        //     // Log the exception for debugging purposes
        //     Log::error('Google callback error: ' . $e->getMessage());
        //     dd($e->getMessage());

        //     // Redirect the user to an error page
        //     return redirect()->route('error.page');
        // }
