<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function show($id)
    {
        $user = User::with('profile')->findOrFail($id);
        $profile = $user->profile ?: new Profile();
        
        return view('profiles.show', compact('user', 'profile'));
    }

    public function edit()
    {
        $user = auth()->user();
        $profile = $user->getOrCreateProfile();
        
        return view('profiles.edit', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'about_me' => 'nullable|string|max:1000',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = auth()->user();
        $profile = $user->getOrCreateProfile();

        $data = $request->only(['username', 'birthday', 'about_me']);

        if ($request->hasFile('profile_image')) {
            // Delete old image
            if ($profile->profile_image) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            
            $data['profile_image'] = $request->file('profile_image')->store('profiles', 'public');
        }

        $profile->update($data);

        return redirect()->route('profiles.edit')->with('success', 'Profile updated successfully!');
    }
}