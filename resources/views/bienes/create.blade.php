<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nuevo Bien Nacional') }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ tipo: 'mueble' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('bienes.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Tipo de Bien -->
                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="tipo_bien" :value="__('Tipo de Bien')" />
                                <select id="tipo_bien" name="tipo_bien" x-model="tipo" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="mueble">Mueble / Equipo</option>
                                    <option value="vehiculo">Vehículo</option>
                                </select>
                                <x-input-error :messages="$errors->get('tipo_bien')" class="mt-2" />
                            </div>

                            <!-- Código Interno -->
                            <div>
                                <x-input-label for="codigo_interno" :value="__('Código Interno')" />
                                <x-text-input id="codigo_interno" class="block mt-1 w-full" type="text" name="codigo_interno" :value="old('codigo_interno')" />
                                <x-input-error :messages="$errors->get('codigo_interno')" class="mt-2" />
                            </div>

                            <!-- Descripción -->
                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="descripcion" :value="__('Descripción')" />
                                <textarea id="descripcion" name="descripcion" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" required>{{ old('descripcion') }}</textarea>
                                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                            </div>

                            <!-- Sede -->
                            <div>
                                <x-input-label for="sede_id" :value="__('Sede')" />
                                <select id="sede_id" name="sede_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Seleccione una sede...</option>
                                    @foreach ($sedes as $sede)
                                        <option value="{{ $sede->id }}" {{ old('sede_id') == $sede->id ? 'selected' : '' }}>{{ $sede->nombre }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('sede_id')" class="mt-2" />
                            </div>

                            <!-- Organización -->
                            <div>
                                <x-input-label for="organizacion_id" :value="__('Organización')" />
                                <select id="organizacion_id" name="organizacion_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach ($organizaciones as $org)
                                        <option value="{{ $org->id }}" {{ old('organizacion_id') == $org->id ? 'selected' : '' }}>{{ $org->nombre }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('organizacion_id')" class="mt-2" />
                            </div>



                            <!-- Categoría -->
                            <div>
                                <x-input-label for="categoria_especifica_id" :value="__('Categoría Específica')" />
                                <select id="categoria_especifica_id" name="categoria_especifica_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Seleccione una categoría...</option>
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id }}" {{ old('categoria_especifica_id') == $cat->id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('categoria_especifica_id')" class="mt-2" />
                            </div>

                            <hr class="col-span-1 md:col-span-2 border-gray-200">

                            <!-- Campos para VEHICULOS -->
                            <template x-if="tipo === 'vehiculo'">
                                <div class="col-span-1 md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="proveedor_id" :value="__('Proveedor')" />
                                        <select id="proveedor_id" name="proveedor_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                            <option value="">Seleccione un proveedor...</option>
                                            @foreach ($proveedores as $proveedor)
                                                <option value="{{ $proveedor->id }}" {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>{{ $proveedor->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <x-input-label for="unidad_administrativa_id" :value="__('Unidad Administrativa')" />
                                        <select id="unidad_administrativa_id" name="unidad_administrativa_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                            <option value="">Seleccione unidad administrativa...</option>
                                            @foreach ($unidades as $unidad)
                                                <option value="{{ $unidad->id }}" {{ old('unidad_administrativa_id') == $unidad->id ? 'selected' : '' }}>{{ $unidad->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <x-input-label for="forma_adquisicion" :value="__('Forma de Adquisición')" />
                                        <x-text-input id="forma_adquisicion" class="block mt-1 w-full" type="text" name="forma_adquisicion" :value="old('forma_adquisicion')" />
                                    </div>
                                    <div>
                                        <x-input-label for="numero_documento" :value="__('Número de Documento')" />
                                        <x-text-input id="numero_documento" class="block mt-1 w-full" type="text" name="numero_documento" :value="old('numero_documento')" />
                                    </div>
                                    <div>
                                        <x-input-label for="moneda" :value="__('Moneda')" />
                                        <x-text-input id="moneda" class="block mt-1 w-full" type="text" name="moneda" :value="old('moneda')" />
                                    </div>
                                    <div>
                                        <x-input-label for="estado_uso" :value="__('Estado del Uso del Bien')" />
                                        <x-text-input id="estado_uso" class="block mt-1 w-full" type="text" name="estado_uso" :value="old('estado_uso')" />
                                    </div>
                                    <div>
                                        <x-input-label for="condicion_fisica" :value="__('Condición Física')" />
                                        <x-text-input id="condicion_fisica" class="block mt-1 w-full" type="text" name="condicion_fisica" :value="old('condicion_fisica')" />
                                    </div>
                                    <div>
                                        <x-input-label for="marca" :value="__('Marca')" />
                                        <x-text-input id="marca" class="block mt-1 w-full" type="text" name="marca" :value="old('marca')" />
                                    </div>
                                    <div>
                                        <x-input-label for="modelo" :value="__('Modelo')" />
                                        <x-text-input id="modelo" class="block mt-1 w-full" type="text" name="modelo" :value="old('modelo')" />
                                    </div>
                                    <div>
                                        <x-input-label for="color" :value="__('Color')" />
                                        <x-text-input id="color" class="block mt-1 w-full" type="text" name="color" :value="old('color')" />
                                    </div>
                                    <div>
                                        <x-input-label for="categoria_general" :value="__('Categoría General')" />
                                        <x-text-input id="categoria_general" class="block mt-1 w-full" type="text" name="categoria_general" :value="old('categoria_general')" />
                                    </div>
                                    <div>
                                        <x-input-label for="sub_categoria" :value="__('Sub Categoría')" />
                                        <x-text-input id="sub_categoria" class="block mt-1 w-full" type="text" name="sub_categoria" :value="old('sub_categoria')" />
                                    </div>
                                    <div>
                                        <x-input-label for="codigo" :value="__('Código')" />
                                        <x-text-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" />
                                    </div>
                                    <div>
                                        <x-input-label for="anos_vida_util" :value="__('Años de Vida Útil')" />
                                        <x-text-input id="anos_vida_util" class="block mt-1 w-full" type="number" name="anos_vida_util" :value="old('anos_vida_util')" />
                                    </div>
                                    <div>
                                        <x-input-label for="valor_residual" :value="__('Valor Residual')" />
                                        <x-text-input id="valor_residual" class="block mt-1 w-full" type="number" step="0.01" name="valor_residual" :value="old('valor_residual')" />
                                    </div>
                                    <div class="col-span-1 md:col-span-2">
                                        <x-input-label for="observaciones" :value="__('Observaciones')" />
                                        <textarea id="observaciones" name="observaciones" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ old('observaciones') }}</textarea>
                                    </div>
                                    
                                    <div class="col-span-1 md:col-span-2">
                                        <h3 class="font-medium text-gray-900 border-b pb-2 mb-4">Campos Anteriores</h3>
                                    </div>
                                    <div>
                                        <x-input-label for="placa" :value="__('Placa')" />
                                        <x-text-input id="placa" class="block mt-1 w-full" type="text" name="placa" :value="old('placa')" />
                                    </div>
                                    <div>
                                        <x-input-label for="serial_carroceria" :value="__('Serial Carrocería')" />
                                        <x-text-input id="serial_carroceria" class="block mt-1 w-full" type="text" name="serial_carroceria" :value="old('serial_carroceria')" />
                                    </div>
                                    <div>
                                        <x-input-label for="serial_motor" :value="__('Serial Motor')" />
                                        <x-text-input id="serial_motor" class="block mt-1 w-full" type="text" name="serial_motor" :value="old('serial_motor')" />
                                    </div>
                                    <div>
                                        <x-input-label for="anio_fabricacion" :value="__('Año de Fabricación')" />
                                        <x-text-input id="anio_fabricacion" class="block mt-1 w-full" type="number" name="anio_fabricacion" :value="old('anio_fabricacion')" />
                                    </div>
                                </div>
                            </template>

                            <!-- Campos para MUEBLES -->
                            <template x-if="tipo === 'mueble'">
                                <div class="col-span-1 md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="serial" :value="__('Serial (Equipo)')" />
                                        <x-text-input id="serial" class="block mt-1 w-full" type="text" name="serial" :value="old('serial')" />
                                    </div>
                                    <div>
                                        <x-input-label for="marca" :value="__('Marca')" />
                                        <x-text-input id="marca" class="block mt-1 w-full" type="text" name="marca" :value="old('marca')" />
                                    </div>
                                </div>
                            </template>

                             <hr class="col-span-1 md:col-span-2 border-gray-200">

                            <!-- Información Financiera -->
                            <div>
                                <x-input-label for="fecha_adquisicion" :value="__('Fecha de Adquisición')" />
                                <x-text-input id="fecha_adquisicion" class="block mt-1 w-full" type="date" name="fecha_adquisicion" :value="old('fecha_adquisicion')" />
                            </div>
                            <div>
                                <x-input-label for="valor_adquisicion" :value="__('Valor de Adquisición')" />
                                <x-text-input id="valor_adquisicion" class="block mt-1 w-full" type="number" step="0.01" name="valor_adquisicion" :value="old('valor_adquisicion')" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('bienes.index') }}" class="mr-4 text-sm text-gray-600 hover:text-gray-900 underline">Cancelar</a>
                            <x-primary-button>
                                {{ __('Guardar Bien') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
