<div class="row setup-content {{$currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
    <div class="col-xs-12">
        <div class="col-md-12">
            <h3> Paso 1</h3>
            <p>Todos los elementos con <i class="fa fa-asterisk" aria-hidden="true"></i> son requeridos.</p>
            <div class="form-group">
                @error('titulo') <div class="alert alert-danger">{{ $message }}</div> @enderror
                <label for="title">Título <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                <input type="text" wire:model.debounce.500ms="titulo" class="form-control" id="titulo">
            </div>
            <div class="form-group" wire:ignore>
                <label for="descripcion">Descripción <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                <textarea name="descripcion" wire:model="descripcion" rows="10" cols="40" class="form-control tinymce-editor" id="descripcion"></textarea>
            </div>

            @error('descripcion') <div class="alert alert-danger">{{ $message }}</div> @enderror

            <div class="form-group">
                @error('issn')<div class="alert alert-danger"> {{ $message }}</div> @enderror
                <label for="issn">ISSN:</label>
                <input type="text" wire:model="issn" class="form-control" id="issn" >
            </div>

            <div class="form-group">
                @error('issne')<div class="alert alert-danger">{{ $message }}</div> @enderror
                <label for="issn">ISSN-e:</label>
                <input type="text" wire:model="issne" class="form-control" id="issne" >
            </div>

            <div class="form-group">
                @error('issne')<div class="alert alert-danger">{{ $message }}</div> @enderror
                <label for="issn">Ruta a la revista:</label>
                <input type="text" wire:model="ojs_ruta" class="form-control" id="ojs_ruta" >
            </div>

            <div class="form-group">
                @error('anio_inicio') <div class="alert alert-danger">{{ $message }}</div> @enderror
                <label for="issn">Año de inicio <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                <input type="text" wire:model="anio_inicio" class="form-control" id="anio_inicio" >
            </div>

            <div class="form-group">
                @error('situacion') <div class="alert alert-danger">{{ $message }}</div> @enderror
                <label>Situación <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                <select class="custom-select" wire:model="situacion" id="situacion">
                    <option value="" selected="">Selecciona algo...</option>
                    <option value="Vigente">Vigente</option>
                    <option value="Descontinuada">Descontinuada</option>
                </select>
            </div>

            <div class="form-group">
                @error('arbitrada') <div class="alert alert-danger">{{ $message }}</div> @enderror
                <label>Arbitrada <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                <select class="custom-select" wire:model="arbitrada" id="arbitrada">
                    <option value="" selected="">Selecciona algo...</option>
                    <option value="Sí">Sí</option>
                    <option value="No">No</option>
                </select>
            </div>

            <div class="form-group">
                @error('tipo_revista') <div class="alert alert-danger">{{ $message }}</div> @enderror
                <label>Tipo de revista <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                <select class="custom-select" wire:model="tipo_revista" id="tipo_revista">
                    <option value="" selected="">Selecciona algo...</option>
                    <option value="Cultural">Cultural</option>
                    <option value="Divulgación">Divulgación</option>
                    <option value="Investigación">Investigación</option>
                    <option value="Técnico-Profesional">Técnico-Profesional</option>
                </select>
            </div>

            <div class="form-group">
                @error('soporte') <div class="alert alert-danger">{{ $message }}</div> @enderror
                <label>Soportes <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                <select class="custom-select" wire:model="soporte" id="soporte">
                    <option value="" selected="">Selecciona algo...</option>
                    <option value="Digital">Digital</option>
                    <option value="Impreso">Impreso</option>
                    <option value="Ambas">Digital e Impreso</option>
                </select>
            </div>

            <div class="form-group">
                @error('id_area_conocimiento') <div class="alert alert-danger">{{ $message }}</div> @enderror
                <label>Areas de conocimiento <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                <select class="custom-select" wire:model="id_area_conocimiento" id="id_area_conocimiento">
                    <option value="" selected="">Selecciona algo...</option>
                    @foreach ($areas_conocimiento as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                @error('id_frecuencia') <div class="alert alert-danger">{{ $message }}</div> @enderror
                <label>Frecuencias <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                <select class="custom-select" wire:model="id_frecuencia" id="id_frecuencia">
                    <option value="" selected="">Selecciona algo...</option>
                    @foreach ($frecuencias ?? '' as $frecuencia)
                        <option value="{{ $frecuencia->id }}">{{ $frecuencia->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                @error('id_subsistema') <div class="alert alert-danger">{{ $message }}</div> @enderror
                <label>Subsistema <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                <select class="custom-select" wire:model="id_subsistema" id="id_subsistema">
                    <option value="" selected="">Selecciona algo...</option>
                    @foreach ($subsistemas as $subsistema)
                        <option value="{{ $subsistema->id }}">{{ $subsistema->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group" wire:ignore>
                <label for="descripcion">Indicadores:</label>
                <textarea name="indicador" wire:model="indicador" rows="10" cols="40" class="form-control tinymce-editor" id="indicador"></textarea>
            </div>

            @if (isset($updateMode) and $updateMode)
                <button class="btn btn-success btn-lg pull-right" wire:click="myUpdate" type="button">Guardar</button>
            @endif
            <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Siguiente</button>
        </div>
    </div>
</div>