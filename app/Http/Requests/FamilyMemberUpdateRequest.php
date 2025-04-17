<?php

namespace App\Http\Requests;

use App\Models\FamilyMember;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FamilyMemberUpdateRequest extends FormRequest
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
        //  . HeadOfFamily::find($this->route('head_of_family'))->user_id
        return [
        'name' => 'required|string|max:255',
        'email' => [
            'nullable',
            'string',
            'email',
            'max:255',
            Rule::unique('users', 'email')->ignore(
                FamilyMember::find($this->route('family_member'))->user_id
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
        'relation' => 'required|string|in:wife,husband,child'
    ];
    }
}
