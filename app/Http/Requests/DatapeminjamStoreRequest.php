<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatapeminjamStoreRequest extends FormRequest
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
            'nama_peminjam' => 'required',
            'kelas' => 'required',
            'no_telp' => 'required',
            'jk' => 'required',
        ];
    }
}
