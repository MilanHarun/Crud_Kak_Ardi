<?php

namespace App\Http\Requests;

use App\Models\peminjam;
use Illuminate\Foundation\Http\FormRequest;

class PeminjamStoreRequest extends FormRequest
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
            'peminjam' => 'required',
            'tanggal_pinjam' => 'required',
            'judul_buku' => 'required',
            'tanggal_kembali' => 'required',
            'petugas' => 'required',

        ];
    }
}
