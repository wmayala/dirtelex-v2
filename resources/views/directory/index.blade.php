<x-guest-layout>
    @section('title','Directorio')
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-3 text-gray-900 fs-3">
                    <div class="col-6">
                        {{ __("DIRECTORIO") }}
                    </div>

                    {{-- El menú de directorio sólo podría mostrar un index de cada modelo, con buscador y opción ver(show) --}}
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
