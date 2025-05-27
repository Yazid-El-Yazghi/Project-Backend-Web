<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChildRegistrationRequest;
use App\Models\ChildRegistration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registrations.create');
    }

    public function store(ChildRegistrationRequest $request)
    {
        ChildRegistration::create($request->validated());

        return redirect()->route('registrations.success')
                        ->with('success', 'Inschrijving succesvol verzonden! We nemen binnenkort contact met je op.');
    }

    public function success()
    {
        return view('registrations.success');
    }
}