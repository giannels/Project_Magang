<?php

namespace App\Exports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KaryawanExport implements FromCollection, WithHeadings
{
    // Ambil semua data
    public function collection()
    {
        return Karyawan::select('id', 'nama', 'jabatan', 'email', 'telepon')->get();
    }

    // Tambahkan header kolom
    public function headings(): array
    {
        return [
            'ID',
            'Nama',
            'Jabatan',
            'Email',
            'Telepon'
        ];
    }
}
