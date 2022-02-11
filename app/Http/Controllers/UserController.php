<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @return View
     */
    public function profile(): View
    {
        return view('users.profile', [
            'user' => Auth::user()
        ]);
    }

    /**
     * @param UpdateProfileRequest $request
     * 
     * @return RedirectResponse
     */
    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $data = $request->validated();

        User::query()
            ->where('id', Auth::user()->getAuthIdentifier())
            ->update($data);

        return redirect()->route('users.profile')->with('success', __('user.successfully_updated'));
    }

    /**
     * @param UpdatePasswordRequest $request
     * 
     * @return RedirectResponse
     */
    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $data = $request->validated();

        User::query()
            ->where('id', Auth::user()->getAuthIdentifier())
            ->update([
                'password' => Hash::make($data['password'])
            ]);

        return redirect()->route('users.profile')->with('success', __('user.password_successfully_updated'));
    }
}
