<?php

namespace App\Http\Requests;

use App\Models\HeadOfFamily;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class HeadOfFamilyUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //  . HeadOfFamily::find($this->route('head_of_family'))->user_id
        return [
        'name' => 'required|string|max:255',
        'email' => [
            'nullable',
            'string',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore(
                HeadOfFamily::find($this->route('head_of_family'))->user_id
            ),
        ],
        'password' => 'nullable|string|min:8',
        'profile_picture' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        'identity_number' => 'required|integer',
        'gender' => 'required|string|in:male,female',
        'date_of_birth' => 'required|date',
        'phone_number' => 'required|string',
        'occupation' => 'required|string',
        'marital_status' => 'required|string|in:married,single',
    ];
    }
}
