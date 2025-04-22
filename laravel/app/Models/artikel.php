<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class artikel extends Model
{
    use HasFactory;
    protected $table = 'table_artikel';
    protected $primaryKey = 'id_artikel';

    protected $fillable = [
        'id_artikel',
        'judul',
        'isi',
        'author',
        'is_show',
        'created_at',
        'updated_at',
    ];

    // Define relationship with admin (one-to-many)
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'author', 'id');
    }
}
