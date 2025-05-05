<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vaksin extends Model
{
    use HasFactory;

    protected $table = 'table_vaksin';
    protected $primaryKey = 'id_vaksin';

    protected $fillable = [
        'nama_vaksin',
    ];

    /**
     * Relasi ke Balita (jika benar ada)
     */
    public function balita()
    {
        return $this->belongsTo(Balita::class, 'id_balita', 'id_balita');
    }
}
