<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class petugas extends Model
{
    use HasFactory;
    protected $table = 'table_petugas_kader';
    protected $primaryKey = 'id_petugas_kader';
    protected $fillable = [
        'nama_petugas',
        'nomor_petugas', 
        'alamat_petugas'
    ];

    // One petugas can have many jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_petugas_kader');
    }
}
