<x-app-layout>
    @section('title','Editar usuario')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-3 text-gray-900">
                    <div class="fs-3">
                        {{ __("EDITAR USUARIO") }}
                    </div>
                </div>
                <div class="row p-5">
                    <form action="{{ route('user.update', $user->id) }}" method="post">
                        @csrf @method('put')
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
                                                autofocus
                                                required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="email" class="uppercase">Correo electrónico:</label></td>
                                        <td>
                                            <input class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                                type="text"
                                                id="email"
                                                name="email"
                                                value="{{ $user->email }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="new_password" class="uppercase">Contraseña:</label></td>
                                        <td>
                                            <input class="bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                                type="password"
                                                id="new_password"
                                                name="new_password"
                                                placeholder="Escriba una nueva contraseña">
                                            <div class="mb-2 fs-6 fw-bold">Dejar en blanco para mantener su contraseña</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="status" class="uppercase">Estado:</label></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="col-6 d-flex align-items-center gap-2">
                                                    <input class="bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                                                        type="radio"
                                                        id="act"
                                                        name="status"
                                                        value="1"
                                                        {{ $user->status===1?'checked':'' }}>
                                                    <label for="act">ACTIVO</label>
                                                </div>
                                                <div class="col-6 d-flex align-items-center gap-2">
                                                    <input class="col-6 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                                                        type="radio"
                                                        id="inact"
                                                        name="status"
                                                        value="0"
                                                        {{ $user->status===0?'checked':'' }}>
                                                    <label for="inact">INACTIVO</label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <br>
                        <div class="d-flex align-items-center justify-content-center gap-3">
                            <button type="submit" class="btn mt-3 text-sm uppercase w-25" style="background-color: #111e60; color: #f2f2f2">
                                <strong>Guardar</strong>
                            </button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3 text-sm uppercase w-25">
                                <strong>Cancelar</strong>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
