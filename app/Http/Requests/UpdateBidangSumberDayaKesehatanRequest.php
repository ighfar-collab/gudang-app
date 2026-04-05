<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBidangSumberDayaKesehatanRequest extends FormRequest
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
          'year' => 'nullable|integer|min:1900|max:2100',
        'month' => 'nullable|string|in:Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember',
        'lokasi' => 'nullable|string|max:255',
        'indeks_rasio_dokter_dengan_penduduk' => 'nullable|numeric|min:0',
        'indeks_rasio_dokter_spesialis_dengan_penduduk' => 'nullable|numeric|min:0',
    ];
    }
}
