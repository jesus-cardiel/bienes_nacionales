<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaGeneral extends Model
{
    use HasFactory;

    protected $table = 'categorias_generales';
    protected $fillable = ['nombre'];

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class);
    }
}
