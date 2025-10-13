<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class ProfileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();

        return view('profiles.profile', compact('user'));
    }

    public function update(Request $request)
    {
        // dd($request->file('icon'));
        $user = Auth::user();

        $request->validate([
        'name' => 'required|between:2,12',
        'email' => ['required','email','between:5,40',Rule::unique('users', 'email')->ignore($user->id), ],
        'bio' => 'nullable|string|max:150',
        'password' => 'required|alpha_num|confirmed|between:8,20',
        'icon_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|',
        ]);

        $updateData = [];

        $updateData['username'] = $request->input('name');
        $updateData['email'] = $request->input('email');
        $updateData['bio'] = $request->input('bio');

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->input('password'));
        }

        if ($request->hasFile('icon_image')) {
            $path = $request->file('icon_image')->store('public');
            $updateData['icon_image'] = basename($path);
        }

        $user->update($updateData);

            return redirect('/top');
        }

}
