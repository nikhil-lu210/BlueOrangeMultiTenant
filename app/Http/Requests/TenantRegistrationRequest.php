<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TenantRegistrationRequest extends FormRequest
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
            'company_name' => ['required', 'string', 'max:255', 'unique:tenant_requests,name'],
            'super_admin_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:tenants,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    /**
     * Get custom error messages for validation rules.
     */
    public function messages(): array
    {
        return [
            'company_name.required' => 'The company name is required.',
            'company_name.string' => 'The company name must be a valid string.',
            'company_name.max' => 'The company name cannot be more than 255 characters.',

            'super_admin_name.required' => 'Your name is required.',
            'super_admin_name.string' => 'Your name must be a valid string.',
            'super_admin_name.max' => 'Your name cannot be more than 255 characters.',

            'email.required' => 'The email address is required.',
            'email.string' => 'The email must be a valid string.',
            'email.email' => 'Please provide a valid email address.',
            'email.max' => 'The email cannot be more than 255 characters.',
            'email.unique' => 'This email is already registered for a company.',

            'password.required' => 'The password is required.',
            'password.string' => 'The password must be a valid string.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.confirmed' => 'The password confirmation does not match.',
        ];
    }
}
