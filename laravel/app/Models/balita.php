<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;

    protected $table = 'table_balita';

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
    }

    
    public function vitamin()
    {
        return $this->belongsTo(Vitamin::class, 'id_vitamin');
    }


    public function getStatusAkunTextAttribute()
    {
        switch ($this->status_akun) {
            case 'approved':
                return 'Approved';
            case 'rejected':
                return 'Rejected';
            case 'waiting':
                return 'Waiting';
            default:
                return 'Unknown';
        }
    }

    public function getStatusAkunWarnaAttribute()
    {
        switch ($this->status_akun) {
            case 'approved':
                return 'green';
            case 'rejected':
                return 'red';
            case 'waiting':
                return 'gray'; 
            default:
                return 'black'; 
        }
    }
}
