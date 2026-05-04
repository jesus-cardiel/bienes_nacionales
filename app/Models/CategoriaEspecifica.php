<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaEspecifica extends Model
{
    use HasFactory;

    protected $table = 'categorias_especificas';
    protected $fillable = ['subcategoria_id', 'nombre'];

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }

    public function bienes()
    {
        return $this->hasMany(Bien::class);
    }
}
