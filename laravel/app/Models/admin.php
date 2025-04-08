<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_artikel',
        'judul',
        'isi', 
        'author',
        'is_show'
    ];

    // One admin can have many articles
    public function articles()
    {
        return $this->hasMany(Article::class, 'id_artikel');
    }
}
