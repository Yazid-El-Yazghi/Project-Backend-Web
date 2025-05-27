<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

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
            'about_me' => 'nullable|string|max:1000'
        ]);

        $user = auth()->user();
        $profile = $user->getOrCreateProfile();

        $data = $request->only(['username', 'birthday', 'about_me']);

        $profile->update($data);

        return redirect()->route('profiles.edit')->with('success', 'Profiel succesvol bijgewerkt!');
    }
}