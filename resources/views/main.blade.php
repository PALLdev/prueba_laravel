<x-layout>
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">                    
        <div class="flex">
            <form class="" action="{{ route('post') }}">
                <label class="ml-12" for="rut">Ingresa un rut</label>
                <input type="text" id="rut" name="rut">
                <button class="" type="submit">Enviar</button>
            </form>
        </div>                                                                    
    </div>

    <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 sm:text-left">
            Otra cosa
        </div>

        <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
    </div>
</x-layout>