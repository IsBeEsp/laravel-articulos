<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Detalles del artículo
    </h2>
</x-slot>

    <div class="mx-auto my-10 max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full" 
        src="{{Storage::url($article->imagen)}}">
        <div class="px-6 py-4">
          <div class="font-bold text-xl mb-2">
            {{$article->nombre}}
          </div>
          <div class="text-l mb-2">
            {{$article->user->name}}
          </div>
          <p class="text-gray-700 text-base">
            {{$article->descripcion}}
          </p>
          <p class="text-gray-700 text-base">
            <b>Precio: </b>{{$article->pvp}} €
          </p>
          <p class="text-gray-700 text-base">
            <b>Stock: </b>{{$article->stock}}
          </p>
        </div>
      </div>

</x-app-layout>
