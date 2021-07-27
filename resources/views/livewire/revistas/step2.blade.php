<div class="row setup-content mt-3 {{$currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Paso 2</h3>
            {{-- Aquí se cargará los nombres de los responsables seleccionados --}}
            <div class="table-responsive mt-3">
                @if(count($selected_responsables))
                    <h5>Responsables seleccionados:</h5>
                    <table class="table table-bordered mt-5" style="margin: 10px 0 10px 0;">
                        <thead class="thead-light">
                            <tr>
                                <th>Orden</th>
                                <th>Rol en la revista</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Telefonos</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($selected_responsables as $responsable)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$responsable['role']}}</td>
                                    <td>{{$responsable['responsable']['grado']}} {{$responsable['responsable']['nombres']}} {{$responsable['responsable']['apellidos']}}</td>
                                    <td>{{$responsable['responsable']['correo_electronico']}}</td>
                                    <td>{{$responsable['responsable']['telefonos']}}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" wire:click.prevent="quitarResponsable({{ $loop->index }})">Quitar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            <h5>Selecciona los usuarios responsables de la revista</h5>
            @include('livewire.revistas.responsables_modal')
            <div class="table-responsive mt-3">
                <input type="text"  class="form-control" placeholder="Buscar" wire:model="searchTerm" />
                {{ $responsables->links() }}
                @error('selected_responsables') <div class="alert alert-danger">{{ $message }}</div> @enderror
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
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarResponsableModal" wire:click.prevent="modalRolResponsable({{ $responsable->id }})" {{ (collect($selected_responsables)->contains('responsable.id', $responsable->id)) ? 'disabled':'' }}>
                                      Agregar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @if (isset($updateMode) and $updateMode)
                    <button class="btn btn-success btn-lg pull-right" wire:click="myUpdate" type="button">Guardar</button>
                @endif
                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="secondStepSubmit" type="button" >Siguiente</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Regresar</button>
            </div>
        </div>
    </div>
</div>