<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Categorías de Bienes') }}
            </h2>
            <a href="{{ route('categories.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg shadow-md hover:bg-indigo-700 transition">
                + Nueva Categoría
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100 border-b border-gray-200 uppercase text-xs text-gray-500 tracking-wider">
                                    <th class="p-4 rounded-tl-lg">ID</th>
                                    <th class="p-4">Nombre de Categoría</th>
                                    <th class="p-4">Descripción</th>
                                    <th class="p-4 text-center rounded-tr-lg">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-medium">
                                @forelse ($categories as $category)
                                    <tr class="border-b hover:bg-indigo-50 transition">
                                        <td class="p-4 text-gray-500">{{ $category->id }}</td>
                                        <td class="p-4 text-gray-800 font-bold">{{ $category->name }}</td>
                                        <td class="p-4 text-gray-600">{{ $category->description ?? 'Sin descripción' }}</td>
                                        <td class="p-4 flex gap-2 justify-center">
                                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button onclick="return confirm('¿Eliminar esta categoría? Esto podría afectar los bienes registrados.')" class="text-red-500 hover:underline">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-6 text-center text-gray-500">
                                            No hay categorías registradas.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
