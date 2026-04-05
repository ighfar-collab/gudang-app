<?php



namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBidangPelayananKesehatanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'year' => 'nullable|integer|min:1900|max:2100',
                    'month' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'persentase_fasyankes_terakreditasi' => 'nullable|numeric|min:0|max:100',
            'jumlah_rs_terakreditasi' => 'nullable|integer|min:0',
            'jumlah_puskesmas_terakreditasi_madya' => 'nullable|integer|min:0',
        ];
    }
}

