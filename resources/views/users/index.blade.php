<x-app-layout>
    @section('title','Usuarios')
    @include('layouts.notifications')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-3 text-gray-900 fs-3">
                    <div class="col-6">
                        {{ __("USUARIOS") }}
                    </div>
                    <div class="col-6 d-flex justify-content-end gap-2">
                        <a class="btn rounded uppercase fw-bold w-auto d-flex justify-content-between align-items-center"
                            style="background-color: #111e60; color: #f2f2f2;" href="">
                            <i class="fa fa-magic" aria-hidden="true"></i>
                        </a>
                        <a class="btn rounded uppercase fw-bold w-50 d-flex justify-content-between align-items-center"
                            style="background-color: #111e60; color: #f2f2f2;" href="{{ route('user.create') }}">
                            <i class="fa fa-bars"></i>
                            Agregar
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>
                @include('layouts.search')
                <div class="container p-3">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NOMBRE</th>
                                        <th>CORREO ELECTRÓNICO</th>
                                        <th class="text-center">CREADO</th>
                                        <th class="text-center">MODIFICADO</th>
                                        <th class="text-center">ACCIONES</th>
                                        <th class="text-center">ESTADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="col-3">{{ $user->name }}</td>
                                            <td class="col-3">{{ $user->email }}</td>
                                            <td class="col-2 text-center">{{ $user->created_at->format('d/m/Y') }} {{ $user->created_at->format('H:i') }}</td>
                                            <td class="col-2 text-center">{{ $user->updated_at->format('d/m/Y') }} {{ $user->updated_at->format('H:i') }}</td>
                                            <td class="text-center">
                                                <div class="d-flex gap-3 justify-content-center">
                                                    <div class="">
                                                        <a href="{{ route('user.show', $user->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    </div>
                                                    <div class="">
                                                        <a href="{{ route('user.edit', $user->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                @if($user->status==1)
                                                    <span class="badge bg-success">ACTIVO</span>
                                                @else
                                                    <span class="badge bg-danger">INACTIVO</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
