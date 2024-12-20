<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be an email.',
            'password.required' => 'Password field is required.',
            'password.min' => 'Password must be more than 5 characters.'
        ];
    }
}
