<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class visited extends Model
{
    use HasFactory;
    protected $table = 'table_visited';
    protected $primaryKey = 'id_kunjungan';

    protected $fillable = [
        'tanggal_penimbangan',
        'bulan_penimbangan',
        'berat_badan',
        'tinggi_badan', 
        'lingkar_kepala',
        'lingkat_lengan',
        'status_gizi',
        'asi_esklusif',
        'id_balita',
        'id_posyandu',
        'id_petugas_kader'
    ];

    // Define relationship with Balita model (One-to-One)
    public function balita()
    {
        return $this->belongsTo(Balita::class, 'id_balita');
    }


    // Define relationship with Posyandu model (One-to-One)
    public function posyandu()
    {
        return $this->belongsTo(Posyandu::class, 'id_posyandu');
    }

    // Define relationship with PetugasKader model (One-to-One)
    public function petugas()
    {
        return $this->belongsTo(petugas::class, 'id_petugas_kader');
    }
}
