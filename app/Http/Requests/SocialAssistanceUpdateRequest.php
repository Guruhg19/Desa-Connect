<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialAssistanceUpdateRequest extends FormRequest
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
            'thumbnail' => 'nullable|image|mimes:png,jpg|max:2048',
            'name' =>  'required|string|max:255',
            'category' => 'required|in:staple,cash,subsidized fuel,health',
            'amount' => 'required',
            'provider' => 'required|string',
            'description' => 'required',
            'is_available' => 'required|boolean'
        ];
    }

    public function attributes()
    {
        return [
            'thumbnail' => 'Thumbnail',
            'name' => 'Nama',
            'category' => 'Kategori',
            'amount' => 'Jumlah Bantuan',
            'provider' => 'Penyedia',
            'description' => 'Deskripsi',
            'is_available' => 'Ketersediaan'
        ];
    }
}
