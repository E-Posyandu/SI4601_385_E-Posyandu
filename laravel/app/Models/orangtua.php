<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orangtua extends Model
{
    use HasFactory;

    protected $table = 'table_orangtua';
    protected $primaryKey = 'id_orangtua';
    protected $fillable = [
        'nama_orangtua',
        'nik_orangtua', 
        'alamat',
        'no_telp',
        'email'
         // Added phone number to fillable columns
    ];

    // Define one-to-many relationship with Balita
    public function balita()
    {
        return $this->hasMany(Balita::class, 'id_orangtua', 'id_orangtua');
    }
}
