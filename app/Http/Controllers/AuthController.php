<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Redirect to the login page
     */
    public function login()
    {
        return view('auth/login');
    }

    /**
     * Perform user's registration
     */
    public function performLogin(LoginUserRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => __('auth.invalid_credentials')
        ]);
    }

    /**
     * Redirect to the login page
     */
    public function register()
    {
        return view('auth/register');
    }

    /**
     * Perform user's registration
     */
    public function performRegister(RegisterUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::query()
            ->create($data);

        Auth::login($user);

        return redirect(route('dashboard'));
    }

    /**
     * Perform user's logout
     */
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        return redirect()->route('login');
    }
}