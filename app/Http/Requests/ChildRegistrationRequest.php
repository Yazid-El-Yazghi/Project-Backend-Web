<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChildRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'child_name' => 'required|string|max:255',
            'age' => 'required|integer|min:4|max:18',
            'parent_name' => 'required|string|max:255',
            'parent_email' => 'required|email|max:255',
            'parent_phone' => 'nullable|string|max:20',
            'tshirt_size' => 'required|in:XS,S,M,L,XL,XXL',
            'shoe_size' => 'required|integer|min:20|max:50',
        ];
    }

    public function messages()
    {
        return [
            'child_name.required' => 'De naam van het kind is verplicht.',
            'age.required' => 'De leeftijd is verplicht.',
            'age.min' => 'Het kind moet minimaal 4 jaar oud zijn.',
            'age.max' => 'Het kind mag maximaal 18 jaar oud zijn.',
            'parent_name.required' => 'De naam van de ouder/voogd is verplicht.',
            'parent_email.required' => 'Het e-mailadres is verplicht.',
            'parent_email.email' => 'Voer een geldig e-mailadres in.',
            'tshirt_size.required' => 'De t-shirt maat is verplicht.',
            'tshirt_size.in' => 'Selecteer een geldige t-shirt maat.',
            'shoe_size.required' => 'De schoenmaat is verplicht.',
            'shoe_size.min' => 'De schoenmaat moet minimaal 20 zijn.',
            'shoe_size.max' => 'De schoenmaat mag maximaal 50 zijn.',
        ];
    }
}