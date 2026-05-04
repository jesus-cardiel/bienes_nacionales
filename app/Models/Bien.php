<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;

    protected $table = 'bienes';

    protected $fillable = [
        'tipo_bien',
        'codigo_interno',
        'descripcion',
        'forma_adquisicion',
        'fecha_adquisicion',
        'numero_documento',
        'valor_adquisicion',
        'moneda',
        'estado_uso',
        'condicion_fisica',
        'marca',
        'modelo',
        'color',
        'anos_vida_util',
        'valor_residual',
        'observaciones',
        'dias',
        'codigo',
        'sede_id',
        'organizacion_id',
        'proveedor_id',
        'unidad_administrativa_id',
        'categoria_especifica_id',
        'empleado_id',
        'serial',
        'anio_fabricacion',
        'serial_carroceria',
        'serial_motor',
        'placa',
    ];

    public function sede()
    {
        return $this->belongsTo(Sede::class);
    }

    public function organizacion()
    {
        return $this->belongsTo(Organizacion::class);
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function unidadAdministrativa()
    {
        return $this->belongsTo(UnidadAdministrativa::class);
    }

    public function categoriaEspecifica()
    {
        return $this->belongsTo(CategoriaEspecifica::class);
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
