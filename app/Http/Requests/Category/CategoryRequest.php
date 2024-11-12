<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'display_order' => 'required|unique:categories,display_order,' . $this->id,
            ];
        } else {
            return [
                'name' => 'required',
                'slug' => 'required|unique:categories,slug',
                'display_order' => 'required|unique:categories,display_order',
            ];
        }
    }
    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'slug.required' => __('validation.required'),
            'slug.unique' => __('validation.unique'),
            'display_order.required' => __('validation.required'),
            'display_order.unique' => __('validation.unique'),
        ];
    }
}
