<div class="row setup-content mt-3 {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-4">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Paso 4</h3>
            {{--  Idiomas --}}
            @if(count($selected_idiomas))
                <div class="table-responsive">
                    <h5>Idioma(s) seleccionados:</h5>
                    <table class="table table-bordered" style="margin: 10px 0 10px 0;">
                        <thead class="thead-light">
                            <tr>
                                <th>Orden</th>
                                <th>Idioma</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($selected_idiomas as $idioma)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$idioma['nombre']}}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" wire:click.prevent="quitarIdioma({{ $loop->index }})">Quitar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <h5>Selecciona idioma(s) para la revista <span><i class="fa fa-asterisk fa-1" aria-hidden="true"></i></span>:</h5>
            {{-- <p>Todos los elementos con <i class="fa fa-asterisk" aria-hidden="true"></i> son requeridos.</p> --}}
            @error('selected_idiomas') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>Idioma</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($idiomas as $idioma)
                            <tr>
                                <td>{{ $idioma->nombre }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" wire:click.prevent="agregarIdioma({{ $idioma->id }})" {{ (collect($selected_idiomas)->contains('id', $idioma->id)) ? 'disabled':'' }}>
                                      Agregar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>

            {{-- Temas --}}

            @if(count($selected_temas))
                <div class="table-responsive">
                    <h5>Temas seleccionados:</h5>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Orden</th>
                                <th>Tema</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($selected_temas as $tema)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$tema['nombre']}}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm" wire:click.prevent="quitarTema({{ $loop->index }})">Quitar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <h5>Selecciona Tema(s) para la revista <span><i class="fa fa-asterisk fa-1" aria-hidden="true"></i></span>:</h5>
            @error('selected_temas') <div class="alert alert-danger">{{ $message }}</div> @enderror
            <div class="table-responsive">
                <input type="text"  class="form-control" placeholder="Buscar Tema" wire:model="searchTermTema" />
                <table class="table table-bordered mt-3">
                    <thead class="thead-light">
                        <tr>
                            <th>Tema</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($temas as $tema)
                            <tr>
                                <td>{{ $tema->nombre }}</td>
                                <td>
                                    <button type="button" class="btn btn-success" wire:click.prevent="agregarTema({{ $tema->id }})" {{ (collect($selected_temas)->contains('id', $tema->id)) ? 'disabled':'' }}>
                                      Agregar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>

            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="fourthStepSubmit">Siguiente</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">Regresar</button>
        </div>
    </div>
</div>