<?php

namespace Database\Seeders;

use App\Models\Sede;
use App\Models\Organizacion;
use App\Models\Empleado;
use App\Models\CategoriaGeneral;
use App\Models\Subcategoria;
use App\Models\CategoriaEspecifica;
use Illuminate\Database\Seeder;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sedes
        $sedes = ['SAT', 'CCS', 'BAEMARI', 'BAMARI', 'BAEL', 'BASE'];
        foreach ($sedes as $name) {
            Sede::firstOrCreate(['nombre' => $name]);
        }

        // Organizaciones
        $orgs = ['ABAE', 'MPPEE', 'CORPOELEC'];
        foreach ($orgs as $name) {
            Organizacion::firstOrCreate(['nombre' => $name]);
        }

        // Empleados (Placeholder)
        Empleado::firstOrCreate([
            'cedula' => 'V-12345678',
            'nombres' => 'Juan',
            'apellidos' => 'Pérez',
            'cargo' => 'Analista de Sistemas'
        ]);

        // Categorías Básicas
        $catGen = CategoriaGeneral::firstOrCreate(['nombre' => 'Mobiliario y Equipos de Oficina']);
        $subCat = Subcategoria::firstOrCreate([
            'nombre' => 'Mobiliario',
            'categoria_general_id' => $catGen->id
        ]);
        CategoriaEspecifica::firstOrCreate([
            'nombre' => 'Sillas',
            'subcategoria_id' => $subCat->id,
            'codigo' => '001'
        ]);

        $catGenVeh = CategoriaGeneral::firstOrCreate(['nombre' => 'Vehículos']);
        $subCatVeh = Subcategoria::firstOrCreate([
            'nombre' => 'Terrestres',
            'categoria_general_id' => $catGenVeh->id
        ]);
        CategoriaEspecifica::firstOrCreate([
            'nombre' => 'Camionetas',
            'subcategoria_id' => $subCatVeh->id,
            'codigo' => '002'
        ]);
    }
}
