<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_category',
        'nama_category',
        'atribut',
        'nilai_bobot',
    ];

    public function crips()
    {
        return $this->hasMany(Crips::class,'category_id');
    }
}
