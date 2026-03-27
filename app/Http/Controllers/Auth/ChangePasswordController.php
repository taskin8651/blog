<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('auth.passwords.edit');
    }

    /*
    |--------------------------------------------------------------------------
    | Update Password
    |--------------------------------------------------------------------------
    */
    public function update(UpdatePasswordRequest $request)
    {
        auth()->user()->update([
            'password' => $request->password
        ]);

        return redirect()->route('profile.password.edit')
            ->with('message', __('global.change_password_success'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update Profile (🔥 Updated)
    |--------------------------------------------------------------------------
    */
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        // 🔥 Basic fields
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'designation' => $request->designation,
            'address' => $request->address,
        ]);

        // 🔥 Profile Image (Spatie Media)
        if ($request->hasFile('image')) {
            $user->clearMediaCollection('profile_image');

            $user->addMediaFromRequest('image')
                ->toMediaCollection('profile_image');
        }

        return redirect()->route('profile.password.edit')
            ->with('message', __('global.update_profile_success'));
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Account
    |--------------------------------------------------------------------------
    */
    public function destroy()
    {
        $user = auth()->user();

        // email unique banane ke liye
        $user->update([
            'email' => time() . '_' . $user->email,
        ]);

        $user->delete();

        return redirect()->route('login')
            ->with('message', __('global.delete_account_success'));
    }
}