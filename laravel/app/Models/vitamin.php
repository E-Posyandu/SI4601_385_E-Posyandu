<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vitamin extends Model {
    use HasFactory;
    protected $table = 'table_vitamin';
    protected $primaryKey = 'id_vitamin';
    
    protected $fillable = [
        'nama_vitamin',
    ];
    
    // One vitamin belongs to one child
    public function balita()
    {
        return $this->belongsTo(Balita::class, 'id_balita');
    }
}