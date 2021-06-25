<div class="row setup-content mt-3 {{-- {{ $currentStep != 4 ? 'displayNone' : '' }} --}}" id="step-4">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3>Paso 4</h3>
            <p>Todos los elementos con <i class="fa fa-asterisk" aria-hidden="true"></i> son requeridos.</p>
            {{-- Seleccionado uno o varios idiomas --}}

             <div class="form-group">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            @error('selected_idiomas') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            <h4>Idiomas <i class="fa fa-asterisk" aria-hidden="true"></i>:</h4>
                            @foreach ($idiomas as $idioma)
                                <div class="mt-3 mr-3">
                                    <label style="display: inline;">
                                        <input type="checkbox" wire:model="selected_idiomas" value="{{ $idioma->id }}">
                                        {{ $idioma->nombre }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-6">
                            @if(count($selected_idiomas))
                                <h4>Idiomas seleccionados:</h4>
                            @endif
                            <ul>
                                @foreach ($selected_idiomas as $selected)
                                    @foreach ($idiomas as $idioma)
                                        @if ($idioma->id == $selected)
                                            <li>{{ $idioma->nombre }}</li>
                                            @continue
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Seleccionado uno o varios temas --}}

             <div class="form-group">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            @error('selected_temas') <div class="alert alert-danger">{{ $message }}</div> @enderror
                            <h4>Temas <i class="fa fa-asterisk" aria-hidden="true"></i>:</h4>
                            @foreach ($temas as $tema)
                                    <div class="mt-3 mr-3">
                                        <label>
                                            <input type="checkbox" wire:model="selected_temas" value="{{ $tema->id }}">
                                            {{ $tema->nombre }}
                                        </label>
                                    </div>
                                @endforeach
                        </div>
                        <div class="col-6">
                            @if(count($selected_temas))
                                <h4>Temas seleccionados:</h4>
                            @endif
                            <ul>
                                @foreach ($selected_temas as $selected)
                                    @foreach ($temas as $tema)
                                        @if ($tema->id == $selected)
                                            <li>{{ $tema->nombre }}</li>
                                            @continue
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="fourthStepSubmit">Siguiente</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">Regresar</button>
        </div>
    </div>
</div>