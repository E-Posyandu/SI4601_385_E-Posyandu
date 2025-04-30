<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\ReportPerkembangan;

class Balita extends Authenticatable
{
    use HasFactory, Notifiable;
    
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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'tanggal_lahir', 
    ];

    // Add authentication identifier methods
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    // Your existing relationships
    public function orangtua()
    {
        return $this->belongsTo(Orangtua::class, 'id_orangtua');
    }

    public function kunjunganTerakhir()
    {
        return $this->hasOne(Visited::class, 'id_balita')
                    ->latestOfMany('tanggal_penimbangan');
    }

    public function reportPerkembangan()
    {
        return $this->hasMany(ReportPerkembangan::class, 'id_balita');
    }
}