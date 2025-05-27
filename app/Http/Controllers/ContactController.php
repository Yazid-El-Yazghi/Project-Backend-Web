<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.show');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000'
        ]);

        $contactMessage = ContactMessage::create($request->all());

        // Send email to admin
        try {
            Mail::send('emails.contact', ['contactMessage' => $contactMessage], function ($message) use ($contactMessage) {
                $message->to(config('mail.admin_email', 'admin@example.com'))
                        ->subject('New Contact Message: ' . $contactMessage->subject)
                        ->replyTo($contactMessage->email, $contactMessage->name);
            });
        } catch (\Exception $e) {
            // Log error but don't fail the request
            logger('Failed to send contact email: ' . $e->getMessage());
        }

        return redirect()->route('contact.show')
                        ->with('success', 'Your message has been sent successfully!');
    }
}