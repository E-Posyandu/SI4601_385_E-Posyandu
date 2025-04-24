<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'password',
        'nik_anak',
        'status_akun', 
    ];

    protected $dates = [
        'tanggal_lahir', 
    ];

    public function orangtua()
    {
        return $this->belongsTo(Orangtua::class, 'id_orangtua');
    }

    public function vaksin()
    {
        return $this->belongsTo(Vaksin::class, 'id_vaksin');
        // Tambahkan third parameter jika id yang dirujuk bukan 'id' di tabel vaksin
    }

    public function vitamin()
    {
        return $this->belongsTo(Vitamin::class, 'id_vitamin');
    }

     public function kunjunganTerakhir()
    {
        return $this->hasOne(Visited::class, 'id_balita', 'id_balita')->latestOfMany('tanggal_penimbangan');
    }
}
