<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Posyandu extends Model
{
    use HasFactory;
    protected $table = 'table_posyandu';
    protected $primaryKey = 'id_posyandu';

    protected $fillable = [
        'nama_posyandu',
        'alamat_posyandu',
        'id_admin'
    ];

    // Relationship with Admin (One-to-One)
    public function admin()
    {
        return $this->belongsTo(admin::class, 'id_admin', 'id_admin');
    }

    // Relationship with Kunjungan (One-to-Many)
    public function kunjungan()
    {
        return $this->hasMany(Kunjungan::class, 'id_posyandu', 'id_posyandu');
    }
}
