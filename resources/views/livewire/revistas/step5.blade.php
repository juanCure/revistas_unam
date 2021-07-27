<div class="row setup-content mt-3 {{$currentStep != 5 ? 'displayNone' : '' }}" id="step-5">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Paso 5</h3>
            <div class="table-responsive mt-3">
                @if(count($selected_indices))
                    <h5>Índices seleccionados:</h5>
                    <table class="table table-bordered" style="margin: 10px 0 10px 0;">
                        <thead class="thead-light">
                            <tr>
                                <th>Orden</th>
                                <th>Nombre</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($selected_indices as $indice)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $indice['nombre'] }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" wire:click.prevent="quitarIndice({{ $loop->index }})">Quitar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

                <h5>Selecciona los índices a los cuales pertenece la revista:</h5>
                @error('selected_indices') <div class="alert alert-danger">{{ $message }}</div> @enderror
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            <th width="150px">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($indexadores as $indexador)
                        <tr>
                            <td>{{ $indexador->nombre }}</td>
                            <td>
                                {{-- <button class="btn btn-success btn-sm">Agregar</button> --}}
                                <button type="button" class="btn btn-success" wire:click.prevent="agregarIndice({{ $indexador->id }})" {{ (collect($selected_indices)->contains('id', $indexador->id)) ? 'disabled':'' }}>
                                      Agregar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="form-group">
                    @error('otros_indices') <span class="error">{{ $message }}</span> @enderror
                    <label for="issn">Otros indices:</label>
                    <input type="text" wire:model="otros_indices" class="form-control" id="otros_indices" >
                </div>

                @if (isset($updateMode) and $updateMode)
                    <button class="btn btn-success btn-lg pull-right" wire:click="myUpdate" type="button">Guardar</button>
                @endif
                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="fifthStep" type="button" >Siguiente</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(4)">Regresar</button>
            </div>
        </div>
    </div>
</div>