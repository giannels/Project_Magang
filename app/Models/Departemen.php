<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'departemen';

    // Kolom yang bisa diisi
    protected $fillable = [
        'nama_departemen',
        'deskripsi',
    ];

    // Relasi: 1 departemen punya banyak karyawan
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
