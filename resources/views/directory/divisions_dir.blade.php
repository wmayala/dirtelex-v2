<x-guest-layout>
    @section('title','Divisiones')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-3 text-gray-900 fs-3">
                    <div class="col-6">
                        {{ __("DIVISIONES") }}
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
                                        <th>INSTITUCIÓN</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th class="text-center">ESTADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($divisions as $division)
                                        @if($division->status==1)
                                            <tr>
                                                <td>{{ $division->division }}</td>
                                                <td>{{ $division->institution_id?$division->institution->institution:'No posee instituciones asociadas' }}</td>
                                                <td>{{ $division->description?$division->description:'No definida' }}</td>
                                                <td class="col text-center"><span class="badge bg-success">ACTIVO</span></td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
