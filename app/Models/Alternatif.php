<?php

namespace App\Models;

use App\Models\NilaiBobot;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatif';

    protected $fillable = ['code', 'nohp', 'nama', 'image', 'alamat', 'harga', 'gander'];

    public function nilaiBobot()
    {
        return $this->hasMany(NilaiBobot::class);
    }

    public function detailalternatif()
    {
        return $this->hasMany(DetailAlternatif::class, 'alternatif_id');
    }
}
