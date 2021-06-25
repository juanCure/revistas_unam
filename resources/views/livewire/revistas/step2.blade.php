<div class="row setup-content mt-3 {{-- {{$currentStep != 2 ? 'displayNone' : '' }} --}}" id="step-2">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Paso 2</h3>
            {{-- Aquí se cargará los nombres de los responsables seleccionados --}}
            <div class="table-responsive mt-3">
                <h5>Responsables seleccionados:</h5>
                <table class="table table-bordered mt-5" style="margin: 10px 0 10px 0;">
                    <thead class="thead-light">
                        <tr>
                            <th>Rol en la revista</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefonos</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Director</td>
                            <td>Juan Manuel Rodríguez Martínez</td>
                            <td>manuel2489@gmail.com</td>
                            <td>5565562062</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Quitar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h5>Selecciona los usuarios responsables de la revista</h5>
            @include('livewire.revistas.responsables_modal')
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
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarResponsableModal" wire:click.prevent="modalRolResponsable({{ $responsable->id }})">
                                      Agregar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="secondStepSubmit" type="button" >Siguiente</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Regresar</button>
            </div>
        </div>
    </div>
</div>