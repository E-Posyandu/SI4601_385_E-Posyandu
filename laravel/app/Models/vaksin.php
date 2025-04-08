<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vaksin extends Model
{
    use HasFactory;
    protected $table = 'table_vaksin';
    protected $primaryKey = 'id_vaksin';
    
    protected $fillable = [
        'nama_vaksin',
        'tanggal_vaksin',
        'id_balita'
    ];

    /**
     * Get the balita associated with the vaccine
     */
    public function balita()
    {
        return $this->belongsTo(Balita::class, 'id_balita', 'id_balita');
    }
}
