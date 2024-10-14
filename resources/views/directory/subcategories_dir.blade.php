<x-guest-layout>
    @section('title','Subcategorías')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-3 text-gray-900 fs-3">
                    <div class="col-6">
                        {{ __("SUBCATEGORIAS") }}
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
                                        <th>CATEGORÍA</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th class="text-center">ESTADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subcategories as $subcategory)
                                        @if($subcategory->status==1)
                                            <tr>
                                                <td class="col-3">
                                                    <a href="{{ route('directory.subcategories_show', $subcategory->id) }}">{{ $subcategory->subcategory }}</a>
                                                </td>
                                                <td class="col-4">{{ $subcategory->category->category }}</td>
                                                <td class="col-3">{{ $subcategory->description?$subcategory->description:'No definida' }}</td>
                                                <td class="text-center"><span class="badge bg-success">ACTIVO</span></td>
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
