<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKaryawanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama'    => 'sometimes|nullable|string|max:255',
            'jabatan' => 'sometimes|nullable|string|max:100',
            'email'   => [
                'sometimes',
                'nullable',
                'email',
                Rule::unique('karyawans', 'email')->ignore($this->route('karyawan')),
            ],
            'telepon' => [
                'sometimes',
                'nullable',
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
