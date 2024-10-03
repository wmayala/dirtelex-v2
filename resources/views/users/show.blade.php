<x-app-layout>
    @section('title','Detalles del usuario')
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
                                <td><label for="name" class="uppercase">Nombre:</label></td>
                                <td>
                                    <input class="mb-2 bg-gray-50 border border-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                        type="text"
                                        id="name"
                                        name="name"
                                        value="{{ $user->name }}"
                                        disabled>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="email" class="uppercase">Correo electrónico:</label></td>
                                <td>
                                    <input class="mb-2 bg-gray-50 border border-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                        type="text"
                                        id="email"
                                        name="email"
                                        value="{{ $user->email }}"
                                        disabled>
                                </td>
                            </tr>
                            <tr>
                                <tr>
                                    <td><label for="status" class="uppercase">Estado:</label></td>
                                    <td>
                                        <input class="mb-2 bg-gray-50 border border-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                            type="text"
                                            id="status"
                                            name="status"
                                            value="{{ $user->status==1?'ACTIVO':'INACTIVO' }}"
                                            disabled>
                                    </td>
                                </tr>
                            </tr>
                        </table>
                    </div>
                    <div class="text-center">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3 text-sm uppercase col-3">
                            <strong>Cerrar</strong>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
