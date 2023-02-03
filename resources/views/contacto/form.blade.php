<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto w-1/2 bg-gray-200 rounded shadow-lg px-2 py-4">
                <form action="{{ route('contacto.procesar') }}" method="POST">
                    @csrf
                    <x-jet-label class="mb-2">Asunto</x-jet-label>
                    <x-jet-input type="text" name="asunto" placeholder="Asunto del correo" class="w-full"
                        value="{{ old('asunto') }}" />
                    <x-jet-input-error for="asunto"></x-jet-input-error>

                    <x-jet-label class="mb-2">Correo</x-jet-label>
                    <x-jet-input type="email" name="email" placeholder="Introduzca su email" class="w-full"
                        value="{{ old('email') }}" />
                    <x-jet-input-error for="email"></x-jet-input-error>
                    
                    <div class="flex flex-row-reverse mt-2">
                        <button type="submit"
                            class="mr-3 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-paper-plane"></i> Enviar
                        </button>
                        <a
                            href="{{ route('dashboard') }}"class="mr-3 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            <i class="fas fa-xmark"></i> Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
</x-app-layout>
