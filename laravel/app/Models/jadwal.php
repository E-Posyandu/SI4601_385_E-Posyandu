<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'table_jadwal';
    protected $primaryKey = 'id_jadwal';
    public $incrementing = true; 
    protected $keyType = 'int';

    protected $fillable = [
        'id_jadwal',
        'nama_kegiatan',
        'jenis_kegiatan',
        'tanggal_kegiatan',
        'id_petugas_kader',
        'id_posyandu',
    ];
    
}
