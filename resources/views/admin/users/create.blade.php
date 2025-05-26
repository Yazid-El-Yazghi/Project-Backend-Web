@extends('layouts.app')

@section('content')
<div style="padding: 3rem 0;">
    <div style="max-width: 1200px; margin: 0 auto; padding: 0 1.5rem;">
        <div style="background: white; border-radius: 0.5rem; box-shadow: 0 1px 3px rgba(0,0,0,0.1); overflow: hidden;">
            <div style="padding: 1.5rem;">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #374151; margin-bottom: 1.5rem;">
                    Create User
                </h2>
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf

                    <!-- Name -->
                    <div style="margin-bottom: 1rem;">
                        <label for="name" style="display: block; font-weight: 500; font-size: 0.875rem; color: #374151; margin-bottom: 0.25rem;">Name</label>
                        <input id="name" 
                               style="display: block; margin-top: 0.25rem; width: 100%; border-radius: 0.375rem; border: 1px solid #d1d5db; padding: 0.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);" 
                               type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required 
                               autofocus />
                        @error('name')
                            <p style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div style="margin-bottom: 1rem;">
                        <label for="email" style="display: block; font-weight: 500; font-size: 0.875rem; color: #374151; margin-bottom: 0.25rem;">Email</label>
                        <input id="email" 
                               style="display: block; margin-top: 0.25rem; width: 100%; border-radius: 0.375rem; border: 1px solid #d1d5db; padding: 0.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required />
                        @error('email')
                            <p style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div style="margin-bottom: 1rem;">
                        <label for="password" style="display: block; font-weight: 500; font-size: 0.875rem; color: #374151; margin-bottom: 0.25rem;">Password</label>
                        <input id="password" 
                               style="display: block; margin-top: 0.25rem; width: 100%; border-radius: 0.375rem; border: 1px solid #d1d5db; padding: 0.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);" 
                               type="password" 
                               name="password" 
                               required />
                        @error('password')
                            <p style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Role -->
                    <div style="margin-bottom: 1rem;">
                        <label for="role" style="display: block; font-weight: 500; font-size: 0.875rem; color: #374151; margin-bottom: 0.25rem;">Role</label>
                        <select id="role" 
                                name="role" 
                                style="display: block; margin-top: 0.25rem; width: 100%; border-radius: 0.375rem; border: 1px solid #d1d5db; padding: 0.5rem; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <p style="color: #ef4444; font-size: 0.75rem; margin-top: 0.25rem;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button - VISIBLE AND ON THE LEFT -->
                    <div style="margin-top: 1.5rem; text-align: left;">
                        <button type="submit" 
                                style="background-color: #3b82f6; color: white; padding: 12px 24px; border: none; border-radius: 6px; font-weight: bold; font-size: 14px; cursor: pointer; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);"
                                onmouseover="this.style.backgroundColor='#2563eb'"
                                onmouseout="this.style.backgroundColor='#3b82f6'">
                            CREATE USER
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection