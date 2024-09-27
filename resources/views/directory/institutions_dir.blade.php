<x-guest-layout>
    @section('title','Instituciones')
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8 col-11">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-3 text-gray-900 fs-3">
                    <div class="col-6">
                        {{ __("INSTITUCIONES") }}
                    </div>
                </div>
                @include('layouts.search')
                <div class="p-3">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NOMBRE</th>
                                        <th></th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>CATEGORÍA</th>
                                        <th>SUBCATEGORÍA</th>
                                        <th class="text-center">ESTADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($institutions)
                                        @foreach($institutions as $institution)
                                            @if($institution->status)
                                                <tr>
                                                    <td class="col-2">
                                                        <a href="{{ route('directory.institutions_show', $institution->id) }}">{{ $institution->institution }}</a>
                                                    </td>
                                                    <td class="text-center">{{ $institution->acronym }}</td>
                                                    <td class="col-3">{{ $institution->description?$institution->description:'No definida' }}</td>
                                                    <td class="col-3">{{ $institution->category->category }}</td>
                                                    <td class="col-2">{{ $institution->subcategory_id?$institution->subcategory->subcategory:'No definida' }}</td>
                                                    <td class="text-center"><span class="badge bg-success w-100">ACTIVO</span></td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @else
                                        <tr><td colspan="4">No existen instituciones</td></tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
