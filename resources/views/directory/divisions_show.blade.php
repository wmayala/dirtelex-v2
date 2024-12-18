<x-guest-layout>
    @section('title','Detalles de división')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-3 text-gray-900">
                    <div class="fs-3">
                        {{ __("DETALLES")}}
                    </div>
                </div>
                <div class="row p-5">
                    <div class="flex justify-center align-center">
                        <table class="col-6">
                            <tr>
                                <td><label for="division" class="uppercase">Nombre:</label></td>
                                <td>
                                    <input class="mb-2 bg-gray-50 border border-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                        type="text"
                                        id="division"
                                        name="division"
                                        value="{{ $division->division }}"
                                        disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="description" class="uppercase">Descripción:</label></td>
                                <td>
                                    <input class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                        type="text"
                                        id="description"
                                        name="description"
                                        value="{{ $division->description?$division->description:'No definida' }}"
                                        disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="status" class="uppercase">Estado:</label></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 d-flex align-items-center gap-2">
                                            <input class="bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                                                type="text"
                                                id="status"
                                                name="status"
                                                value="{{ $division->status===1?'ACTIVO':'INACTIVO' }}"
                                                disabled>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('directory.divisions') }}" class="btn btn-secondary mt-3 text-sm uppercase col-3">
                            <strong>Regresar</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
