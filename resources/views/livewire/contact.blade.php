<div>
    <form action="{{ route('contact.store' )}}" method="POST">
        @csrf
        <div class="flex justify-center align-center">
            <table class="col-6 w-75">
                <tr>
                    <td><label for="division_id" class="uppercase">División:</label></td>
                    <td>
                        <select class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                            name="division_id"
                            id="division_id"
                            wire:model.lazy='selectedDivision'>
                            <option selected>Seleccione una división</option>
                            <option value="0">No posee</option>
                            @foreach ($division as $div)
                                <option value="{{ $div->id }}">{{ $div->division }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="institution_id" class="uppercase">Institución:</label></td>
                    <td>
                        @if(!is_null($institution))
                            <select class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                name="institution_id"
                                id="institution_id"
                                required>
                                <option selected>Seleccione una institución</option>
                                @forelse ($institution as $ins )
                                    <option value="{{ $ins->id }}">{{ $ins->institution }}</option>
                                @empty
                                    <option>No hay instituciones registradas</option>
                                @endforelse
                            </select>
                        @endif
                        @error('institution_id')<div class="text-danger text-end fw-bold">La institución es requerida</div>@enderror
                    </td>
                </tr>
                <tr>
                    <td><label for="contact" class="uppercase">Nombre:</label></td>
                    <td>
                        <input class="mb-2 bg-gray-50 border border-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                            type="text"
                            id="contact"
                            name="contact"
                            placeholder="Nombre del contacto">
                        @error('contact')<div class="text-danger text-end fw-bold">El nombre es requerido</div>@enderror
                    </td>
                </tr>
                <tr>
                    <td><label for="position" class="uppercase">Cargo o área del contacto:</label></td>
                    <td>
                        <input class="mb-2 bg-gray-50 border border-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                            type="text"
                            id="position"
                            name="position"
                            placeholder="Cargo o área del contacto">
                    </td>
                </tr>
                <tr>
                    <td><label for="phone" class="uppercase">Teléfono:</label></td>
                    <td>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <input class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                type="text"
                                id="code"
                                name="code"
                                placeholder="Código de país y área">
                            <input class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                type="text"
                                id="phone"
                                name="phone"
                                placeholder="Número telefónico">
                            <input class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                type="text"
                                id="extension"
                                name="extension"
                                placeholder="Extensión telefónica">
                        </div>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <input class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                type="text"
                                id="mobile"
                                name="mobile"
                                placeholder="Número telefónico móvil">
                            <input class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                                type="text"
                                id="fax"
                                name="fax"
                                placeholder="Número de fax">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="email" class="uppercase">Correo electrónico:</label></td>
                    <td>
                        <input class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Correo electrónico">
                    </td>
                </tr>
                <tr>
                    <td><label for="specialFeature" class="uppercase">Característica especial:</label></td>
                    <td>
                        <textarea class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                            id="specialFeature"
                            name="specialFeature"
                            placeholder="Alguna característica especial"></textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="clarification" class="uppercase">Aclaración relevante:</label></td>
                    <td>

                        <textarea class="mb-2 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 w-100"
                            id="clarification"
                            name="clarification"
                            placeholder="Alguna característica especial"></textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="typeContact" class="uppercase">Tipo de contacto:</label></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="col-6 d-flex align-items-center gap-2">
                                <input class="bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                                    type="radio"
                                    id="person"
                                    name="typeContact"
                                    value="1"
                                    checked>
                                <label for="act">PERSONA</label>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-2">
                                <input class="col-6 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                                    type="radio"
                                    id="area"
                                    name="typeContact"
                                    value="0">
                                <label for="inact">ÁREA</label>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><label for="language" class="uppercase">Idioma:</label></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="col-6 d-flex align-items-center gap-2">
                                <input class="bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                                    type="radio"
                                    id="es"
                                    name="language"
                                    value="1"
                                    checked>
                                <label for="es">ESPAÑOL</label>
                            </div>
                            <div class="col-6 d-flex align-items-center gap-2">
                                <input class="col-6 bg-gray-50 border border-gray-800 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                                    type="radio"
                                    id="en"
                                    name="language"
                                    value="0">
                                <label for="en">INGLÉS</label>
                            </div>
                        </div>
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
            <a href="{{ route('contact.index') }}" class="btn btn-secondary mt-3 text-sm uppercase w-25">
                <strong>Cancelar</strong>
            </a>
        </div>
    </form>
</div>



























</div>
