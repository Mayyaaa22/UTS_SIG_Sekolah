<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolahs'; // nama tabel (opsional jika sama dengan konvensi)

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email',
        'jenis_sekolah',
        'status_sekolah',
        'akreditasi',
        'website',
        'latitude',
        'longitude',
    ];
}
