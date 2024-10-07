<x-app-layout>
    @section('title','Agregar institución')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-3 text-gray-900">
                    <div class="fs-3">
                        {{ __("AGREGAR INSTITUCIÓN") }}
                    </div>
                </div>
                <div class="row p-5">
                    <form action="{{ route('institution.store') }}" method="POST">
                        @csrf
                        <div class="flex justify-center align-center">
                            <table class="col-6">
                                <tr>
                                    <td><label for="institution" class="uppercase">Nombre:</label></td>
                                    <td>
                                        <input class="mb-2 bg-gray-50 border border-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                            type="text"
                                            id="institution"
                                            name="institution"
                                            placeholder="Nombre de la institución">
                                            @error('institution')<div class="text-danger text-end fw-bold">El nombre es requerido</div>@enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="acronym" class="uppercase">Siglas:</label></td>
                                    <td>
                                        <input class="mb-2 bg-gray-50 border border-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                            type="text"
                                            id="acronym"
                                            name="acronym"
                                            placeholder="Acrónimo o siglas">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="description" class="uppercase">Descripción:</label></td>
                                    <td>
                                        <input class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                            type="text"
                                            id="description"
                                            name="description"
                                            placeholder="Descripción de la institución">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="category_id" class="uppercase">Categoría:</label></td>
                                    <td>
                                        <select name="category_id" id="category_id" class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100">
                                            <option value="" selected>Seleccione una categoría</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')<div class="text-danger text-end fw-bold">La categoría es requerida</div>@enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="subcategory_id" class="uppercase">Subcategoría:</label></td>
                                    <td>
                                        <select name="subcategory_id" id="subcategory_id" class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100">
                                            <option selected>Seleccione una subcategoría</option>
                                            <option value="0">No posee</option>
                                            @foreach($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="division_id" class="uppercase">División:</label></td>
                                    <td>
                                        <select name="division_id" id="division_id" class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100">
                                            <option selected>Seleccione una división</option>
                                            <option value="0">No posee</option>
                                            @foreach($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->division }}</option>
                                            @endforeach
                                        </select>
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
                                                    checked>
                                                <label for="act">ACTIVO</label>
                                            </div>
                                            <div class="col-6 d-flex align-items-center gap-2">
                                                <input class="col-6 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                                                    type="radio"
                                                    id="inact"
                                                    name="status"
                                                    value="0">
                                                <label for="inact">INACTIVO</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn mt-3 text-sm uppercase w-25" style="background-color: #111e60; color: #f2f2f2">
                                <strong>Guardar</strong>
                            </button>
                            <a href="{{ route('institution.index') }}" class="btn btn-secondary mt-3 text-sm uppercase w-25">
                                <strong>Cancelar</strong>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
