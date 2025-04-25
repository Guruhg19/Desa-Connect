<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevelopmentUpdateRequest extends FormRequest
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
            'thumbnail' => 'nullable|image',
            'name' => 'required|string',
            'description' => 'required|string',
            'person_in_charge' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'amount' => 'required|integer',
            'status' => 'required|in:ongoing,completed'
        ];
    }

    public function attributes()
    {
        return [
            'thumbnail' => 'Thumbnail',
            'name' => 'Nama',
            'description' => 'Deskripsi',
            'person_in_charge' => 'Penanggung Jawab',
            'start_date' => 'Tanggal Mulai',
            'end_date' => 'Tanggal Berakhir',
            'amount' => 'Jumlah Dana',
            'status' => 'Status'
        ];
    }
}
