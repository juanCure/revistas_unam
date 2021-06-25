<div class="row setup-content mt-3 {{-- {{ $currentStep != 3 ? 'displayNone' : '' }} --}}" id="step-3">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Paso 3</h3>
            <p>Todos los elementos con <i class="fa fa-asterisk" aria-hidden="true"></i> son requeridos.</p>
            <div class="form-group">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            @error('selected_editoriales') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            <h4>Editoriales <i class="fa fa-asterisk" aria-hidden="true"></i>:</h4>
                            @foreach ($editoriales as $editorial)
                                <div class="editorial">
                                    <label>
                                        <input type="checkbox" wire:model="selected_editoriales" value="{{ $editorial->id }}">
                                        {{ $editorial->nombre }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-6">
                            @if(count($selected_editoriales))
                                <h4>Editoriales seleccionadas:</h4>
                            @endif
                            <ul>
                                @foreach ($selected_editoriales as $selected)
                                    @foreach ($editoriales as $editorial)
                                        @if ($editorial->id == $selected)
                                            <li>{{ $editorial->nombre }}</li>
                                            @continue
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            @error('selected_entidades') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            <h4>Entidades Editoras <i class="fa fa-asterisk" aria-hidden="true"></i>:</h4>
                            @foreach ($entidades as $entidad)
                                <div class="mt-3 mr-3">
                                    <label style="display: inline;">
                                        <input type="checkbox" wire:model="selected_entidades" value="{{ $entidad->id }}"> {{ $entidad->nombre }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-6">
                            @if(count($selected_entidades))
                                <h4>Entidades Editoras seleccionadas:</h4>
                            @endif
                            <ul>
                                @foreach ($selected_entidades as $selected)
                                    @foreach ($entidades as $entidad)
                                        @if ($entidad->id == $selected)
                                            <li>{{ $entidad->nombre }}</li>
                                            @continue
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="thirdStepSubmit">Siguiente</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Regresar</button>
        </div>
    </div>
</div>