<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyMemberStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
        {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'head_of_family_id' => 'required|exists:head_of_families,id',
                'profile_picture' => 'required|image|mimes:png,jpg,jpeg|max:2048',
                'identity_number' => 'required|integer',
                'gender' => 'required|string|in:male,female',
                'date_of_birth' => 'required|date',
                'phone_number' => 'required|string',
                'occupation' => 'required|string',
                'marital_status' => 'required|string|in:married,single',
                'relation' => 'required|string|in:wife,child,husband'
            ];
        }
}
