<x-app-layout>
    @section('title','Divisiones')
    @if(session('success'))
        <div class="d-flex justify-content-center">
            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @elseif(session('danger'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session('danger') }}',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
    {{-- @elseif(session('danger'))
        <div class="d-flex justify-content-center">
            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                <strong>{{ session('danger') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div> --}}
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-3 text-gray-900 fs-3">
                    <div class="col-6">
                        {{ __("DIVISIONES") }}
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <a class="btn rounded uppercase fw-bold w-50 d-flex justify-content-between align-items-center"
                            style="background-color: #111e60; color: #f2f2f2;" href="{{route('division.create')}}">
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
                                        <th>DESCRIPCIÓN</th>
                                        <th class="text-center">ACCIONES</th>
                                        <th class="text-center">ESTADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($divisions as $division)
                                    <tr>
                                        <td class="col-5">{{ $division->division }}</td>
                                        <td class="col-5">{{ $division->description?$division->description:'No definida' }}</td>
                                        <td class="col text-center">
                                            <div class="row">
                                                <div class="col-4">
                                                    <a href="{{ route('division.show', $division->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="{{ route('division.edit', $division->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                </div>
                                                <div class="col-4">
                                                    <form id="delete-form" action="{{ route('division.destroy', $division->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button>
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="col text-center">
                                            @if($division->status==1)
                                                <span class="badge bg-success w-100">ACTIVO</span>
                                            @else
                                                <span class="badge bg-danger w-100">INACTIVO</span>
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
    @if(session('danger'))
        <script>
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡Esta acción no se puede deshacer!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result)=>{
                if(result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        </script>
    @endif
</x-app-layout>


