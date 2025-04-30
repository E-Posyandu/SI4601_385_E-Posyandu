<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class petugas extends Authenticatable
{
    use HasFactory, Notifiable;
    
    protected $table = 'table_petugas_kader';
    protected $primaryKey = 'id_petugas_kader';
    protected $fillable = [
        'nama_petugas',
        'nomor_petugas', 
        'alamat_petugas',
        'username',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // One petugas can have many jadwal
    public function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_petugas_kader');
    }
}