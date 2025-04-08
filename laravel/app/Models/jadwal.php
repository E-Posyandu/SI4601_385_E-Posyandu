<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class jadwal extends Model
{
    use HasFactory;
    protected $table = 'table_jadwal';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = [
        'nama_kegiatan',
        'jenis_kegiatan', 
        'tanggal_kegiatan',
        'id_petugasKader',
        'id_visited'
    ];

    // Relationship with PetugasKader (Many to One)
    public function petugasKader()
    {
        return $this->belongsTo(PetugasKader::class, 'id_petugasKader');
    }

    // Relationship with Visited (One to One)
    public function visited()
    {
        return $this->hasOne(Visited::class, 'id_visited');
    }
}
