<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwals'; // atau 'jadwal' jika nama tabel tanpa "s"

    protected $fillable = [
        'nama_kegiatan',
        'jenis_kegiatan',
        'tanggal_kegiatan',
        'id_petugasKader',
        'id_posyandu',
    ];
}
