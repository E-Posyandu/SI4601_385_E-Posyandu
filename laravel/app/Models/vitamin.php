<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vitamin extends Model
{
    use HasFactory;
    protected $table = 'vitamins';
    protected $primaryKey = 'id_vitamin';

    protected $fillable = [
        'nama_vitamin',
        'tanggal_vitamin'
    ];

    // One vitamin belongs to one child
    public function balita()
    {
        return $this->belongsTo(Balita::class, 'id_balita');
    }
}
