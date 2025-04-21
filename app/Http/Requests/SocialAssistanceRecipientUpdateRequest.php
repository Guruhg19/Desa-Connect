<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialAssistanceRecipientUpdateRequest extends FormRequest
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
            'social_assistance_id' => 'required|exists:social_assistances,id',
            'head_of_family_id' => 'required|exists:head_of_families,id',
            'amount' => 'required|integer',
            'reason' => 'required|string',
            'bank' => 'required|string|in:bri,bca,bni,mandiri',
            'account_number' => 'required',
            'proof' => 'nullable|image',
            'status' => 'nullable|string|in:pending,rejected,approved',

        ];
    }
    public function attributes()
    {
        return [
            'social_assistance_id' => 'Bantuan Sosial',
            'head_of_family_id' => 'Kepala Keluarga',
            'amount' => 'Nominal',
            'reason' => 'Alasan',
            'bank' => 'Bank',
            'account_number' => 'Nomor Rekening',
            'proof' => 'Bukti Penerimaan',
            'status' => 'Status Pengajuan'
        ];
    }
}
