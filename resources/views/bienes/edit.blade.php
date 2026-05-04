<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Bien Nacional') }}: {{ $bien->codigo_interno }}
        </h2>
    </x-slot>

    <div class="py-12" x-data="{ tipo: '{{ $bien->tipo_bien }}' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('bienes.update', $bien) }}" method="POST">
                        @csrf
                        @method('PATCH')

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
                                <x-text-input id="codigo_interno" class="block mt-1 w-full" type="text" name="codigo_interno" :value="old('codigo_interno', $bien->codigo_interno)" />
                                <x-input-error :messages="$errors->get('codigo_interno')" class="mt-2" />
                            </div>

                            <!-- Descripción -->
                            <div class="col-span-1 md:col-span-2">
                                <x-input-label for="descripcion" :value="__('Descripción')" />
                                <textarea id="descripcion" name="descripcion" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" required>{{ old('descripcion', $bien->descripcion) }}</textarea>
                                <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
                            </div>

                            <!-- Sede -->
                            <div>
                                <x-input-label for="sede_id" :value="__('Sede')" />
                                <select id="sede_id" name="sede_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Seleccione una sede...</option>
                                    @foreach ($sedes as $sede)
                                        <option value="{{ $sede->id }}" {{ old('sede_id', $bien->sede_id) == $sede->id ? 'selected' : '' }}>{{ $sede->nombre }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('sede_id')" class="mt-2" />
                            </div>

                            <!-- Organización -->
                            <div>
                                <x-input-label for="organizacion_id" :value="__('Organización')" />
                                <select id="organizacion_id" name="organizacion_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    @foreach ($organizaciones as $org)
                                        <option value="{{ $org->id }}" {{ old('organizacion_id', $bien->organizacion_id) == $org->id ? 'selected' : '' }}>{{ $org->nombre }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('organizacion_id')" class="mt-2" />
                            </div>

                            <!-- Responsable -->
                            <div>
                                <x-input-label for="empleado_id" :value="__('Responsable (Empleado)')" />
                                <select id="empleado_id" name="empleado_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Seleccione un responsable...</option>
                                    @foreach ($empleados as $empleado)
                                        <option value="{{ $empleado->id }}" {{ old('empleado_id', $bien->empleado_id) == $empleado->id ? 'selected' : '' }}>{{ $empleado->nombres }} {{ $empleado->apellidos }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('empleado_id')" class="mt-2" />
                            </div>

                            <!-- Categoría -->
                            <div>
                                <x-input-label for="categoria_especifica_id" :value="__('Categoría Específica')" />
                                <select id="categoria_especifica_id" name="categoria_especifica_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="">Seleccione una categoría...</option>
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->id }}" {{ old('categoria_especifica_id', $bien->categoria_especifica_id) == $cat->id ? 'selected' : '' }}>{{ $cat->nombre }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('categoria_especifica_id')" class="mt-2" />
                            </div>

                            <hr class="col-span-1 md:col-span-2 border-gray-200">

                            <!-- Campos para VEHICULOS -->
                            <template x-if="tipo === 'vehiculo'">
                                <div class="col-span-1 md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="placa" :value="__('Placa')" />
                                        <x-text-input id="placa" class="block mt-1 w-full" type="text" name="placa" :value="old('placa', $bien->placa)" />
                                    </div>
                                    <div>
                                        <x-input-label for="serial_carroceria" :value="__('Serial Carrocería')" />
                                        <x-text-input id="serial_carroceria" class="block mt-1 w-full" type="text" name="serial_carroceria" :value="old('serial_carroceria', $bien->serial_carroceria)" />
                                    </div>
                                    <div>
                                        <x-input-label for="serial_motor" :value="__('Serial Motor')" />
                                        <x-text-input id="serial_motor" class="block mt-1 w-full" type="text" name="serial_motor" :value="old('serial_motor', $bien->serial_motor)" />
                                    </div>
                                    <div>
                                        <x-input-label for="anio_fabricacion" :value="__('Año de Fabricación')" />
                                        <x-text-input id="anio_fabricacion" class="block mt-1 w-full" type="number" name="anio_fabricacion" :value="old('anio_fabricacion', $bien->anio_fabricacion)" />
                                    </div>
                                </div>
                            </template>

                            <!-- Campos para MUEBLES -->
                            <template x-if="tipo === 'mueble'">
                                <div class="col-span-1 md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div>
                                        <x-input-label for="serial" :value="__('Serial (Equipo)')" />
                                        <x-text-input id="serial" class="block mt-1 w-full" type="text" name="serial" :value="old('serial', $bien->serial)" />
                                    </div>
                                    <div>
                                        <x-input-label for="marca" :value="__('Marca')" />
                                        <x-text-input id="marca" class="block mt-1 w-full" type="text" name="marca" :value="old('marca', $bien->marca)" />
                                    </div>
                                </div>
                            </template>

                             <hr class="col-span-1 md:col-span-2 border-gray-200">

                            <!-- Información Financiera -->
                            <div>
                                <x-input-label for="fecha_adquisicion" :value="__('Fecha de Adquisición')" />
                                <x-text-input id="fecha_adquisicion" class="block mt-1 w-full" type="date" name="fecha_adquisicion" :value="old('fecha_adquisicion', $bien->fecha_adquisicion)" />
                            </div>
                            <div>
                                <x-input-label for="valor_adquisicion" :value="__('Valor de Adquisición')" />
                                <x-text-input id="valor_adquisicion" class="block mt-1 w-full" type="number" step="0.01" name="valor_adquisicion" :value="old('valor_adquisicion', $bien->valor_adquisicion)" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a href="{{ route('bienes.index') }}" class="mr-4 text-sm text-gray-600 hover:text-gray-900 underline">Cancelar</a>
                            <x-primary-button>
                                {{ __('Actualizar Bien') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
