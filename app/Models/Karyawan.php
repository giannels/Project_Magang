<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';

    protected $fillable = [
        'nama',
        'jabatan',
        'email',
        'telepon',
        'departemen_id', // tambahin ini biar mass-assignment bisa isi departemen
    ];

    // Relasi: Karyawan milik satu departemen
    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}
