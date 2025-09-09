<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreKaryawanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'    => 'required|string|max:255',
            'jabatan' => 'required|string|max:100',
            'email'   => [
                'required',
                'email',
                Rule::unique('karyawans', 'email'),
            ],
            'telepon' => [
                'required',
                'regex:/^[0-9]+$/',
                'max:20',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'telepon.regex' => 'Nomor telepon hanya boleh berisi angka.',
            'telepon.max'   => 'Nomor telepon maksimal 20 digit.',
        ];
    }
}
