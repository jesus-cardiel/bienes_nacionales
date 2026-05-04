<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Sede;
use App\Models\Organizacion;
use App\Models\Empleado;
use App\Models\Proveedor;
use App\Models\UnidadAdministrativa;
use App\Models\CategoriaEspecifica;
use Illuminate\Http\Request;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bienes = Bien::with(['sede', 'organizacion', 'empleado', 'categoriaEspecifica'])->paginate(15);
        return view('bienes.index', compact('bienes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sedes = Sede::all();
        $organizaciones = Organizacion::all();
        $empleados = Empleado::all();
        $proveedores = Proveedor::all();
        $unidades = UnidadAdministrativa::all();
        $categorias = CategoriaEspecifica::all();

        return view('bienes.create', compact('sedes', 'organizaciones', 'empleados', 'proveedores', 'unidades', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_bien' => 'required|in:mueble,vehiculo',
            'descripcion' => 'required|string',
            'codigo_interno' => 'nullable|string',
            'forma_adquisicion' => 'nullable|string',
            'fecha_adquisicion' => 'nullable|date',
            'valor_adquisicion' => 'nullable|numeric',
            'sede_id' => 'nullable|exists:sedes,id',
            'organizacion_id' => 'nullable|exists:organizaciones,id',
            'categoria_especifica_id' => 'nullable|exists:categorias_especificas,id',
            
            // New fields validation
            'proveedor_id' => 'nullable|exists:proveedores,id',
            'unidad_administrativa_id' => 'nullable|exists:unidades_administrativas,id',
            'numero_documento' => 'nullable|string',
            'moneda' => 'nullable|string',
            'estado_uso' => 'nullable|string',
            'condicion_fisica' => 'nullable|string',
            'marca' => 'nullable|string',
            'modelo' => 'nullable|string',
            'color' => 'nullable|string',
            'codigo' => 'nullable|string',
            'anos_vida_util' => 'nullable|integer',
            'valor_residual' => 'nullable|numeric',
            'observaciones' => 'nullable|string',

            // Vehiculo specifics (previous ones)
            'placa' => 'nullable|string',
            'serial_carroceria' => 'nullable|string',
            'serial_motor' => 'nullable|string',
            'anio_fabricacion' => 'nullable|integer',
            
            // Mueble specifics
            'serial' => 'nullable|string',
        ]);

        Bien::create($request->all());

        return redirect()->route('bienes.index')->with('success', 'Bien registrado exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bien $bien)
    {
        $sedes = Sede::all();
        $organizaciones = Organizacion::all();
        $empleados = Empleado::all();
        $proveedores = Proveedor::all();
        $unidades = UnidadAdministrativa::all();
        $categorias = CategoriaEspecifica::all();

        return view('bienes.edit', compact('bien', 'sedes', 'organizaciones', 'empleados', 'proveedores', 'unidades', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bien $bien)
    {
        $validated = $request->validate([
            'tipo_bien' => 'required|in:mueble,vehiculo',
            'descripcion' => 'required|string',
            'codigo_interno' => 'nullable|string',
            'forma_adquisicion' => 'nullable|string',
            'fecha_adquisicion' => 'nullable|date',
            'valor_adquisicion' => 'nullable|numeric',
            'sede_id' => 'nullable|exists:sedes,id',
            'organizacion_id' => 'nullable|exists:organizaciones,id',
            'categoria_especifica_id' => 'nullable|exists:categorias_especificas,id',
            
            // New fields validation
            'proveedor_id' => 'nullable|exists:proveedores,id',
            'unidad_administrativa_id' => 'nullable|exists:unidades_administrativas,id',
            'numero_documento' => 'nullable|string',
            'moneda' => 'nullable|string',
            'estado_uso' => 'nullable|string',
            'condicion_fisica' => 'nullable|string',
            'marca' => 'nullable|string',
            'modelo' => 'nullable|string',
            'color' => 'nullable|string',
            'codigo' => 'nullable|string',
            'anos_vida_util' => 'nullable|integer',
            'valor_residual' => 'nullable|numeric',
            'observaciones' => 'nullable|string',

            // Vehiculo specifics
            'placa' => 'nullable|string',
            'serial_carroceria' => 'nullable|string',
            'serial_motor' => 'nullable|string',
            'anio_fabricacion' => 'nullable|integer',
            
            // Mueble specifics
            'serial' => 'nullable|string',
        ]);

        $bien->update($request->all());

        return redirect()->route('bienes.index')->with('success', 'Bien actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bien $bien)
    {
        $bien->delete();
        return redirect()->route('bienes.index')->with('success', 'Bien eliminado.');
    }
}
