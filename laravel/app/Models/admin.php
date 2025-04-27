<?php

namespace App\Models;

// Pakai ini, bukan Model biasa
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'table_admin';

    protected $fillable = ['username', 'password'];

    protected $hidden = ['password'];

    // Kalau tabelmu ada created_at dan updated_at, biarin true
    public $timestamps = true;
}
