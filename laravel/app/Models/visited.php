<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class visited extends Model
{
    use HasFactory;
    protected $table = 'visited';
    protected $primaryKey = 'id_visited';

    protected $fillable = [
        'tanggal_penimbangan',
        'bulan_penimbangan',
        'berat_badan',
        'tinggi_badan', 
        'lingkar_kepala',
        'lingkar_lengan',
        'status_gizi',
        'asi_esklusif',
        'id_balita',
        'id_posyandu',
        'id_petugasKader'
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
    public function petugasKader()
    {
        return $this->belongsTo(PetugasKader::class, 'id_petugasKader');
    }
}
