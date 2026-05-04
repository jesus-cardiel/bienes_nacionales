<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Control - Bienes Nacionales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 shadow-indigo-100 border-l-4 border-indigo-600">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">¡Bienvenido al Sistema de Inventario!</h3>
                    <p class="text-gray-600">
                        Has iniciado sesión con éxito. Desde aquí puedes gestionar los activos, departamentos y categorías de la institución pública.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Tarjeta: Bienes Nacionales -->
                <div class="bg-white overflow-hidden shadow-sm hover:shadow-md transition sm:rounded-lg border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg leading-6 font-medium text-gray-900">Bienes Registrados</h4>
                                <p class="text-sm text-gray-500">Gestiona entradas, salidas y estados.</p>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href="{{ route('bienes.index') }}" class="text-indigo-600 hover:text-indigo-900 font-medium text-sm">Gestionar Activos &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta: Categorías -->
                <div class="bg-white overflow-hidden shadow-sm hover:shadow-md transition sm:rounded-lg border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg leading-6 font-medium text-gray-900">Categorías</h4>
                                <p class="text-sm text-gray-500">Clasificación de equipos.</p>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href="#" class="text-gray-400 cursor-not-allowed font-medium text-sm">Próximamente... &rarr;</a>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta: Departamentos -->
                <div class="bg-white overflow-hidden shadow-sm hover:shadow-md transition sm:rounded-lg border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-indigo-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg leading-6 font-medium text-gray-900">Áreas / Ubicaciones</h4>
                                <p class="text-sm text-gray-500">Asignación física de bienes.</p>
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href="#" class="text-gray-400 cursor-not-allowed font-medium text-sm">Próximamente... &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
