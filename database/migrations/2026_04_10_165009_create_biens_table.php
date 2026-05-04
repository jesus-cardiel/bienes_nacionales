<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bienes', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo_bien', ['mueble', 'vehiculo']);
            $table->string('codigo_interno')->nullable();
            $table->text('descripcion');
            $table->string('forma_adquisicion')->nullable();
            $table->date('fecha_adquisicion')->nullable();
            $table->string('numero_documento')->nullable();
            $table->decimal('valor_adquisicion', 15, 2)->nullable();
            $table->string('moneda')->nullable();
            $table->string('estado_uso')->nullable();
            $table->string('condicion_fisica')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('color')->nullable();
            $table->integer('anos_vida_util')->nullable();
            $table->decimal('valor_residual', 15, 2)->nullable();
            $table->text('observaciones')->nullable();
            $table->integer('dias')->nullable();
            $table->string('codigo')->nullable();

            $table->foreignId('sede_id')->nullable()->constrained('sedes')->nullOnDelete();
            $table->foreignId('organizacion_id')->nullable()->constrained('organizaciones')->nullOnDelete();
            $table->foreignId('proveedor_id')->nullable()->constrained('proveedores')->nullOnDelete();
            $table->foreignId('unidad_administrativa_id')->nullable()->constrained('unidades_administrativas')->nullOnDelete();
            $table->foreignId('categoria_especifica_id')->nullable()->constrained('categorias_especificas')->nullOnDelete();
            $table->foreignId('empleado_id')->nullable()->constrained('empleados')->nullOnDelete();

            $table->string('serial')->nullable();
            $table->integer('anio_fabricacion')->nullable();
            $table->string('serial_carroceria')->nullable();
            $table->string('serial_motor')->nullable();
            $table->string('placa')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bienes');
    }
};
