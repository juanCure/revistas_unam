<div class="row setup-content mt-3 {{-- {{$currentStep != 2 ? 'displayNone' : '' }} --}}" id="step-2">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Paso 2</h3>
            <h5>Selecciona los usuarios responsables de la revista</h5>
            <div class="table-responsive mt-3">
                <input type="text"  class="form-control" placeholder="Buscar" wire:model="searchTerm" />
                {{ $responsables->links() }}
                <table class="table table-bordered mt-5" style="margin: 10px 0 10px 0;">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefonos</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($responsables as $responsable)
                            <tr>
                                <td>
                                    {{ $responsable->grado }} {{ $responsable->nombres }} {{ $responsable->apellidos }}
                                </td>
                                <td>{{ $responsable->correo_electronico }}</td>
                                <td>{{ $responsable->telefonos }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" wire:click.prevent="agregarResponsable({{ $responsable->id }})">
                                          Agregar
                                    </button>
                                </td>
                                {{-- <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarResponsableModal" wire:click.prevent="edit({{ $responsable->id }})">
                                          Editar
                                        </button>
                                        <button wire:click="$emit('confirm_remove', {{ $responsable->id }})" class="btn btn-danger btn-sm">Eliminar</button>
                                    </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="thirdStepSubmit" type="button" >Siguiente</button>
            </div>
        </div>
    </div>
</div>