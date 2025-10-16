<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'hobi',
        'foto',
        'no_hp',
        'email',
        'nama_ayah',
        'asal_sekolah',
        'nik',
    ];
}
