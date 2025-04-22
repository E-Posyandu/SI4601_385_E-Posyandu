<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dailyreport extends Model
{
    protected $table = 'table_daily_reports';
    protected $primaryKey = 'id_daily_reports';

    protected $fillable = [
        'id_balita',
        'tanggal',
        'catatan'
    ];

    public function balita()
    {
        return $this->belongsTo(Balita::class, 'id_balita');
    }
}