<x-app-layout>
    @section('title','Agregar contacto')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="row p-3 text-gray-900">
                    <div class="fs-3">
                        {{ __("AGREGAR CONTACTO") }}
                    </div>
                </div>
                <div class="row p-5">
                    <livewire:contact/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
