<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';
    protected $primaryKey = 'id_artikel';

    protected $fillable = [
        'judul',
        'isi',
        'author',
        'is_show'
    ];

    // Define relationship with admin (one-to-many)
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'author', 'id');
    }
}
