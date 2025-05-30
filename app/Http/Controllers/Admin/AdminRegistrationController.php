<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChildRegistration;
use Illuminate\Http\Request;

class AdminRegistrationController extends Controller
{
    public function __construct()
    {
        // Apply middleware to ensure only admins can access this controller
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $registrations = ChildRegistration::latest()->paginate(15);
        return view('admin.registrations.index', compact('registrations'));
    }

    public function show(ChildRegistration $registration)
    {
        return view('admin.registrations.show', compact('registration'));
    }

    public function updateStatus(Request $request, ChildRegistration $registration)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $registration->update(['status' => $request->status]);

        $statusText = match($request->status) {
            'approved' => 'goedgekeurd',
            'rejected' => 'afgewezen',
            default => 'op in behandeling gezet'
        };

        return redirect()->back()->with('success', "Inschrijving is {$statusText}.");
    }

    public function destroy(ChildRegistration $registration)
    {
        $registration->delete();
        return redirect()->route('admin.registrations.index')
                        ->with('success', 'Inschrijving succesvol verwijderd.');
    }
}