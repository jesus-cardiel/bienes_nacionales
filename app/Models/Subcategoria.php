<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    use HasFactory;

    protected $fillable = ['categoria_general_id', 'nombre'];

    public function categoriaGeneral()
    {
        return $this->belongsTo(CategoriaGeneral::class);
    }

    public function categoriasEspecificas()
    {
        return $this->hasMany(CategoriaEspecifica::class);
    }
}
