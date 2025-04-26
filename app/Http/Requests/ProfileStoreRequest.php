<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStoreRequest extends FormRequest
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
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'headman' => 'required|string|max:255',
            'people' => 'required|integer',
            'about' => 'required|string',
            'agricultural_area' => 'required',
            'total_area' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048'
        ];
    }
    public function attributes()
    {
        return [
            'thumbnail' => 'Thumbnail',
            'name' => 'Nama',
            'headman' => 'Kepala Desa',
            'people' => 'Jumlah Penduduk',
            'about' => 'Deskripsi',
            'agricultural_area' => 'Luas Lahan Pertanian',
            'total_area' => 'Luas Total',
            'images' => 'Gambar',
        ];
    }
}
