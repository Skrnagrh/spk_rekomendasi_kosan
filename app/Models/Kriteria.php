<?php

namespace App\Models;

use App\Models\NilaiBobot;
use App\Models\Subkriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';

    protected $fillable = ['code', 'name', 'description', 'type', 'bobot'];

    public function subkriteria()
    {
        return $this->hasMany(Subkriteria::class);
    }

    public function nilaiBobot()
    {
        return $this->hasMany(NilaiBobot::class);
    }
}
