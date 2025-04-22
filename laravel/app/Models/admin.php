<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang digunakan oleh model
    protected $table = 'table_admin';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = ['username', 'password'];

    // Kolom yang tidak perlu ditampilkan (seperti password)
    protected $hidden = ['password'];

    // Aktifkan timestamps jika diperlukan
    public $timestamps = true;
}
