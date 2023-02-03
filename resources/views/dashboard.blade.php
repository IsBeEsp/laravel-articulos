<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de artículos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">
                <a href="{{ route('article.create') }}"
                    class="mr-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    <i class="fas fa-plus"></i> <i class="fas fa-chair"></i> Añadir nuevo artículo
                </a>
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col w-full">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="bg-white border-b">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left font-bold">
                                                Info
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left font-bold">
                                                Nombre
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left font-bold">
                                                Stock
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left font-bold">
                                                Acciones
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($articulos as $articulo)
                                            <tr class="bg-gray-100 border-b">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    <a href="{{ route('article.show', $articulo) }}"
                                                        class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded"><i
                                                            class="fas fa-info"></i></a>
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $articulo->nombre }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $articulo->stock }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    <form action="{{ route('article.destroy', $articulo) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{route('article.edit', $articulo)}}"
                                                            class="mr-3 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <button type="submit"
                                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8">
                        {{ $articulos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
