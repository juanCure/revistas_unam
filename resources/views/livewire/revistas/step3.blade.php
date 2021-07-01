<div class="row setup-content mt-3 {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Paso 3</h3>
            @if(count($selected_editoriales))
                <div class="table-responsive">
                    <h5>Editorial(es) seleccionados:</h5>
                    <table class="table table-bordered" style="margin: 10px 0 10px 0;">
                        <thead class="thead-light">
                            <tr>
                                <th>Orden</th>
                                <th>Nombre</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($selected_editoriales as $editorial)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$editorial['nombre']}}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" wire:click.prevent="quitarEditorial({{ $loop->index }})">Quitar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <h5>Selecciona editorial(es) para la revista <span><i class="fa fa-asterisk fa-1" aria-hidden="true"></i></span>:</h5>
            {{-- <p>Todos los elementos con <i class="fa fa-asterisk" aria-hidden="true"></i> son requeridos.</p> --}}
            @error('selected_editoriales') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Editorial</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($editoriales as $editorial)
                            <tr>
                                <td>{{ $editorial->nombre }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" wire:click.prevent="agregarEditorial({{ $editorial->id }})" {{ (collect($selected_editoriales)->contains('id', $editorial->id)) ? 'disabled':'' }}>
                                      Agregar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>

            {{-- Entidades Acádemicas --}}

            @if(count($selected_entidades))
                <div class="table-responsive">
                    <h5>Entidad(es) Académicas seleccionadas:</h5>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Orden</th>
                                <th>Entidad Académica</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($selected_entidades as $entidad)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$entidad['nombre']}}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" wire:click.prevent="quitarEntidad({{ $loop->index }})">Quitar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <h5>Selecciona Entidad(es) Académica para la revista <span><i class="fa fa-asterisk fa-1" aria-hidden="true"></i></span>:</h5>
            @error('selected_entidades') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <div class="table-responsive">
                <input type="text"  class="form-control" placeholder="Buscar Entidad Académica" wire:model="searchTermEntidad" />
                <table class="table table-bordered mt-3">
                    <thead class="thead-light">
                        <tr>
                            <th>Entidad Académica</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entidades as $entidad)
                            <tr>
                                <td>{{ $entidad->nombre }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" wire:click.prevent="agregarEntidad({{ $entidad->id }})" {{ (collect($selected_entidades)->contains('id', $entidad->id)) ? 'disabled':'' }}>
                                      Agregar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>

            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="thirdStepSubmit">Siguiente</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Regresar</button>
        </div>
    </div>
</div>