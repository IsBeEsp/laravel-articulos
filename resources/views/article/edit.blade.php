<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Añadir nuevo artículo
      </h2>
  </x-slot>
  <x-form :action="route('article.update', $article)" class="w-1/3 mx-auto bg-gray-300 shadow-xl p-5 mt-5 rounded" enctype="multipart/form-data">
    @method('PUT')
    @bind($article)
    <x-form-input type="text" value="{{old('nombre', $article->nombre)}}" name="nombre" label="Nombre" placeholder="Escriba aquí el nombre del artículo"/>
    <x-form-textarea type="text" value="{{old('descripcion', $article->descripcion)}}" name="descripcion" label="Descripción" placeholder="Breve descripción del artículo..."/>
    <x-form-input type="number" value="{{old('pvp', $article->pvp)}}" name="pvp" label="Precio" placeholder="Introduzca el precio del artículo"/>
    <x-form-input type="number" value="{{old('stock', $article->stock)}}" name="stock" label="Stock" placeholder="Introduzca el stock del artículo"/>
    @endbind

    <div class="mx-auto mt-2">
        <img id="preview" src="{{Storage::url($article->imagen)}}">
    </div>

    <div class="text-center mt-4 h-16 rounded">
      <label for="imagen" class=" mr-3 bg-purple-400 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded text-center">
        <i class="fas fa-upload"></i> Subir imagen</label>
      <input type="file" class="hidden" id="imagen" name="imagen">
    </div>

    <div class="mt-4 bg-gray-400 p-1 rounded mx-auto flex">
      <a href="{{route('dashboard')}}" class="w-1/3 mr-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-center">
        <i class ="fas fa-backward"></i> Volver
      </a>
      <button type="submit" class="flex-1 mr-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        <i class ="fas fa-redo"></i> Actualizar
      </button>
    </div>
  </x-form>
</x-app-layout>