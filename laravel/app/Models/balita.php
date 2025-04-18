<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Balita extends Model
{
    use HasFactory;
    
    protected $table = 'table_balita';
    protected $primaryKey = 'id_balita';

    protected $fillable = [
        'nama_balita',
        'tanggal_lahir',
        'jenis_kelamin',
        'golongan_darah',
        'id_orangtua',
        'id_vaksin',
        'id_vitamin',
        'username',
        'password'
    ];

    public function orangtua()
    {
        return $this->belongsTo(Orangtua::class, 'id_orangtua', 'id_orangtua');
    }

    public function vaksin()
    {
        return $this->belongsToMany(Vaksin::class, 'balita_vaksin', 'id_balita', 'id_vaksin')->withTimestamps();
    }

    public function vitamin()
    {
        return $this->belongsToMany(Vitamin::class, 'balita_vitamin', 'id_balita', 'id_vitamin')->withTimestamps();
    }

    public function kunjunganTerakhir()
    {
        return $this->hasOne(Visited::class, 'id_balita', 'id_balita')->latestOfMany('tanggal_penimbangan');
    }
}
