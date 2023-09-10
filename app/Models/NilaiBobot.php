<?php

namespace App\Models;

use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiBobot extends Model
{
    use HasFactory;

    protected $table = 'nilai_bobot';

    protected $fillable = ['nilai', 'kriteria_id', 'alternatif_id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
