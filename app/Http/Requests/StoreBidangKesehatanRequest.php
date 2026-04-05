<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBidangKesehatanRequest extends FormRequest
{
    public function authorize() { return true; }

    public function rules()
    {
        return [
            'year' => 'nullable|integer|min:1900|max:2100',
               'month' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
            'angka_kematian_ibu_per_100000' => 'nullable|numeric|min:0',
            'angka_kematian_bayi_per_1000' => 'nullable|numeric|min:0',
            'prevalensi_stunting' => 'nullable|numeric|min:0|max:100',
            'cakupan_asi_eksklusif' => 'nullable|numeric|min:0|max:100',
        ];
    }
}

