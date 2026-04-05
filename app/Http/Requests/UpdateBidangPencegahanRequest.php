<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBidangPencegahanRequest extends FormRequest
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
              'month' => 'required|string',
            'year' => 'required|integer',
            'persentase_pelayanan_klb' => 'nullable|numeric|min:0|max:100',
            'temuan_kasus_tb' => 'nullable|integer|min:0',
            'persentase_imunisasi_dasar' => 'nullable|numeric|min:0|max:100',
            'pengendalian_merokok_usia_10_18' => 'nullable|numeric|min:0|max:100',
            'persentase_penanganan_krisis' => 'nullable|numeric|min:0|max:100',
        ];
    }
}
