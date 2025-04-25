<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevelopmentApplicantStoreRequest extends FormRequest
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
            'development_id' => 'required|exists:developments,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'nullable|in:pending,approved,rejected'
        ];
    }

    public function attributes()
    {
        return [
            'development_id' => 'Pembangunan',
            'user_id' => 'User',
            'status' => 'Status'
        ];
    }
}
