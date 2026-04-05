<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBidangKesehatanRequest extends FormRequest
{
    /**
     * Tentukan apakah user diizinkan melakukan request ini.
     */
    public function authorize(): bool
    {
        return true; // ubah sesuai kebutuhan (misalnya pakai gate/policy)
    }

    /**
     * Aturan validasi untuk update data.
     */
    public function rules(): array
    {
        return [
            'year' => 'nullable|integer|min:1900|max:2100',
            'lokasi' => 'nullable|string|max:255',
            'angka_kematian_ibu_per_100000' => 'nullable|numeric|min:0',
            'angka_kematian_bayi_per_1000' => 'nullable|numeric|min:0',
            'prevalensi_stunting' => 'nullable|numeric|min:0|max:100',
            'cakupan_asi_eksklusif' => 'nullable|numeric|min:0|max:100',
        ];
    }

    /**
     * Pesan error kustom (opsional, bisa dihapus jika pakai default Laravel).
     */
    public function messages(): array
    {
        return [
            'year.integer' => 'Tahun harus berupa angka.',
            'year.min' => 'Tahun tidak valid.',
            'year.max' => 'Tahun tidak valid.',
            'lokasi.string' => 'Lokasi harus berupa teks.',
            'angka_kematian_ibu_per_100000.numeric' => 'Angka kematian ibu harus berupa angka.',
            'angka_kematian_bayi_per_1000.numeric' => 'Angka kematian bayi harus berupa angka.',
            'prevalensi_stunting.numeric' => 'Prevalensi stunting harus berupa angka.',
            'cakupan_asi_eksklusif.numeric' => 'Cakupan ASI eksklusif harus berupa angka.',
        ];
    }
}

