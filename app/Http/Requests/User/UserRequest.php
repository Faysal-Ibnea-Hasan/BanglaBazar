<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        // Different rules for create and update
        if ($this->has('id')) {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $this->id,
                'password' => 'required|min:5',
                'phone_number' => 'required|string|max:11|unique:users,phone_number,' . $this->id,
                'street_address' => 'string',
                'city' => 'string',
                'district' => 'string',
                'division' => 'string',
                'postal_code' => 'string',
            ];
        } else{
            return [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5',
                'phone_number' => 'required|string|max:11|unique:users,phone_number',
                'street_address' => 'string',
                'city' => 'string',
                'district' => 'string',
                'division' => 'string',
                'postal_code' => 'string',
            ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'email.required' => __('validation.required'),
            'email.email' => __('validation.email'),
            'email.unique' => __('validation.unique'),
            'password.required' => __('validation.required'),
            'password.min' => __('validation.min.string'),
            'phone_number' => __('validation.required'),
            'phone_number.unique' => __('validation.unique'),
            'phone_number.string' => __('validation.string'),
            'phone_number.max' => __('validation.max.string'),
            'street_address.string' => __('validation.string'),
            'city.string' => __('validation.string'),
            'district.string' => __('validation.string'),
            'division.string' => __('validation.string'),
            'postal_code.string' => __('validation.string'),
        ];
    }
}
