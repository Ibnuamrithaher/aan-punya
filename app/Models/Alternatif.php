<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_alternatif',
        'nama_alternatif',
    ];

    public function crips()
    {
        return $this->belongsToMany(Crips::class, 'hasil', 'alternatif_id', 'crip_id')->OrderBy('category_id','asc')->withPivot('hasil');
    }
}
