<?php

namespace App\Models;

use App\Models\Kriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subkriteria extends Model
{
    use HasFactory;

    protected $table = 'subkriteria';

    protected $fillable = ['range', 'nilai', 'kriteria_id'];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

}
