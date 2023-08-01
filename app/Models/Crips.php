<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crips extends Model
{
    use HasFactory;
    protected $table = "crips";
    protected $fillable = [
        'category_id',
        'nama_crips',
        'nilai',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function alternatif()
    {
        return $this->belongsToMany(Alternatif::class, 'hasil', 'alternatif_id', 'crip_id')->withPivot('hasil')->orderByPivot('alternatif_id', 'asc');
    }
}
