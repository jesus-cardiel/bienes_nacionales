<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar Nuevo Departamento / Área') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl border-t-4 border-indigo-600">
                <div class="p-8 text-gray-900">
                    <form method="POST" action="{{ route('departments.store') }}" class="grid grid-cols-1 gap-6">
                        @csrf
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombre del Departamento</label>
                            <input type="text" name="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required placeholder="Ej. Recursos Humanos">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Ubicación Física (Opcional)</label>
                            <input type="text" name="location" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="Ej. Piso 2, Oficina 4">
                        </div>

                        <div class="flex justify-end mt-4">
                            <a href="{{ route('departments.index') }}" class="mr-4 px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition">Cancelar</a>
                            <button type="submit" class="px-6 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 transition">
                                Guardar Área
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
