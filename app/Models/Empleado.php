<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula',
        'nombres',
        'apellidos',
        'cargo',
        'unidad_administrativa_id'
    ];

    public function unidadAdministrativa()
    {
        return $this->belongsTo(UnidadAdministrativa::class);
    }

    public function bienesAsignados()
    {
        return $this->hasMany(Bien::class);
    }
}
