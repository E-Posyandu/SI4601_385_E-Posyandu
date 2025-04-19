<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class balita extends Model
{
    use HasFactory;
    protected $table = 'table_balita';
    protected $primaryKey = 'id_balita';
    protected $fillable = [
        'nama_balita',
        'tanggal_lahir',
        'jenis_kelamin',
        'golongan_darah',
        'tinggi_badan',
        'berat_badan',
        'id_orangtua',
        'id_vaksin',
        'id_vitamin',
        'username',
        'password'
    ];

    // Relationship with parent (one-to-many)
    public function orangtua()
    {
        return $this->belongsTo(Orangtua::class, 'id_orangtua', 'id_orangtua');
    }

    // Relationship with vaccines (many-to-many)
    public function vaksin()
    {
        return $this->belongsToMany(Vaksin::class, 'balita_vaksin', 'id_balita', 'id_vaksin')
            ->withTimestamps();
    }

    // Relationship with vitamins (many-to-many)
    public function vitamin()
    {
        return $this->belongsToMany(Vitamin::class, 'balita_vitamin', 'id_balita', 'id_vitamin')
            ->withTimestamps();
    }
}
