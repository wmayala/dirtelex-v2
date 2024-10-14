<x-guest-layout>
    @section('title','Contactos')
    @include('layouts.notifications')
    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row p-3 text-gray-900 fs-3">
                    <div class="col-6">
                        {{ __("CONTACTOS") }}
                    </div>
                </div>
                @include('layouts.search')
                <div class="text-center fw-bold">Escriba el nombre del contacto o de la institución</div>
                <div class="p-3">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NOMBRE</th>
                                        <th>TELEFONO</th>
                                        <th>CORREO ELECTRÓNICO</th>
                                        <th>INSTITUCIÓN</th>
                                        <th>CATEGORÍA</th>
                                        <th class="text-center">SUBCATEGORÍA<br>DIVISIÓN</th>
                                        <th class="text-center">ESTADO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $contact)
                                    @if($contact->status==1)
                                        <tr>
                                            <td>
                                                <div class="fw-bold fs-5 fst-italic">
                                                    <a href="{{ route('directory.contacts_show', $contact->id) }}">{{ $contact->contact }}</a>
                                                </div>
                                                <div>{{ $contact->position?$contact->position:'' }}</div>
                                            </td>
                                            <td>
                                                <span>{{ $contact->code?'('.$contact->code.') ':'' }}</span><br>
                                                <span>{{ $contact->phone?'Tel.: '.$contact->phone:'' }}</span><br>
                                                <span>{{ $contact->mobile?'Cel.: '.$contact->mobile:'' }}</span><br>
                                                <span>{{ $contact->extension?'Ext.: '.$contact->extension:'' }}</span><br>
                                                <span>{{ $contact->fax?'Fax: '.$contact->fax:'' }}</span>
                                            </td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->institution->institution }}</td>
                                            <td>{{ $contact->institution->category->category }}</td>
                                            <td class="text-center">
                                                {{ $contact->institution->subcategory_id?$contact->institution->subcategory->subcategory:'No definida' }}
                                                <br>
                                                {{ $contact->institution->division_id?$contact->institution->division->division:'No definida' }}
                                            </td>
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
