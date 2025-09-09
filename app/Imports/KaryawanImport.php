<?php

namespace App\Imports;

use App\Models\Karyawan;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class KaryawanImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Skip jika nama atau email kosong
            if (empty($row['nama']) || empty($row['email'])) {
                continue;
            }

            // Update jika email sudah ada, atau insert baru jika email belum ada
            Karyawan::updateOrCreate(
                ['email' => $row['email']], // cek duplikat berdasarkan email
                [
                    'nama'    => $row['nama'],
                    'jabatan' => $row['jabatan'] ?? null,
                    'telepon' => $row['telepon'] ?? null,
                ]
            );
        }
    }
}
