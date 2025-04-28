<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ReportPerkembangan extends Model
{
    use HasFactory;
    protected $table = 'table_report_perkembangan';
    protected $fillable = ['id_balita', 'tanggal', 'file_path'];

    public function balita()
    {
        return $this->belongsTo(balita::class, 'id_balita');
    }
}
