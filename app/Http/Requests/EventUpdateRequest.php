<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventUpdateRequest extends FormRequest
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
            'thumbnail' => 'nullable|image|mimes:png,jpg,jpeg',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
            'is_active' => 'required|boolean'
        ];
    }

    public function attributes()
    {
        return [
        'thumbnail' => 'Thumbnail',
        'name' => 'Nama',
        'description' => 'Deskripsi',
        'price' => 'Harga',
        'date' => 'Tanggal',
        'time' => 'Waktu',
        'is_active' => 'Aktif'
        ];
    }
}
