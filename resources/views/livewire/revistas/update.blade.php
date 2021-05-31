<div>
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-circle {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Paso 1</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-circle {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Paso 2</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}">3</a>
                <p>Paso 3</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-4" type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">3</a>
                <p>Resumen</p>
            </div>
        </div>
    </div>
	{{-- Esta sería la primera página --}}

	<div class="row setup-content {{ $currentStep != 1 ? 'displayNone' : '' }}" id="step-1">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Paso 1</h3>
                <p>Todos los elementos con <i class="fa fa-asterisk" aria-hidden="true"></i> son requeridos.</p>
                <div class="form-group" id="container-title">
                    <label for="title">Título <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                    <input type="text" wire:model.debounce.500ms="titulo" class="form-control" id="titulo">
                    @error('titulo') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>
                <div class="form-group" wire:ignore>
                    <label for="descripcion">Descripción <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                    <textarea name="descripcion" wire:model="descripcion" rows="10" cols="40" class="form-control tinymce-editor" id="descripcion"></textarea>
                </div>

                @error('descripcion') <div class="alert alert-danger">{{ $message }}</div> @enderror

                <div class="form-group">
                    <label for="issn">ISSN:</label>
                    <input type="text" wire:model="issn" class="form-control" id="issn" >
                    @error('issn')<div class="alert alert-danger"> {{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="issn">ISSN-e:</label>
                    <input type="text" wire:model="issne" class="form-control" id="issne" >
                    @error('issne')<div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="issn">Año de inicio <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                    <input type="text" wire:model="anio_inicio" class="form-control" id="anio_inicio" >
                    @error('anio_inicio') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="issn">Otros indices:</label>
                    <input type="text" wire:model="otros_indices" class="form-control" id="otros_indices" >
                    @error('otros_indices') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                	<label>Situación <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                	<select class="custom-select" wire:model="situacion" id="situacion">
						{{-- <option value="" selected="">Selecciona algo...</option> --}}
						<option value="Vigente">Vigente</option>
						<option value="Descontinuada">Descontinuada</option>
					</select>
                    @error('situacion') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                	<label>Arbitrada <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                	<select class="custom-select" wire:model="arbitrada" id="arbitrada">
						{{-- <option value="" selected="">Selecciona algo...</option> --}}
						<option value="Si">Si</option>
						<option value="No">No</option>
					</select>
                    @error('arbitrada') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                	<label>Tipo de revista <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
                	<select class="custom-select" wire:model="tipo_revista" id="tipo_revista">
						{{-- <option value="" selected="">Selecciona algo...</option> --}}
						<option value="Cultural">Cultural</option>
						<option value="Divulgación">Divulgación</option>
						<option value="Investigación">Investigación</option>
						<option value="Técnico-Profesional">Técnico-Profesional</option>
					</select>
                    @error('tipo_revista') <div class="alert alert-danger">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
					<label>Soportes <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
					<select class="custom-select" wire:model="soporte" id="soporte">
                        {{-- <option value="" selected="">Selecciona algo...</option> --}}
                        <option value="Digital">Digital</option>
                        <option value="Impreso">Impreso</option>
                        <option value="Ambas">Digital e Impreso</option>
                    </select>
                    @error('soporte') <div class="alert alert-danger">{{ $message }}</div> @enderror
				</div>

                <div class="form-group">
					<label>Areas de conocimiento <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
					<select class="custom-select" wire:model="id_area_conocimiento" id="id_area_conocimiento">
						{{-- <option value="" selected="">Selecciona algo...</option> --}}
                        @foreach ($areas_conocimiento as $area)
                            <option value="{{ $area->id }}">{{ $area->nombre}}</option>
                        @endforeach
					</select>
                    @error('id_area_conocimiento') <div class="alert alert-danger">{{ $message }}</div> @enderror
				</div>

				<div class="form-group">
					<label>Frecuencias <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
					<select class="custom-select" wire:model="id_frecuencia" id="id_frecuencia">
						{{-- <option value="" selected="">Selecciona algo...</option> --}}
						@foreach ($frecuencias ?? '' as $frecuencia)
							<option value="{{ $frecuencia->id }}">{{ $frecuencia->nombre}}</option>
						@endforeach
					</select>
                    @error('id_frecuencia') <div class="alert alert-danger">{{ $message }}</div> @enderror
				</div>
				<div class="form-group">
					<label>Subsistema <i class="fa fa-asterisk" aria-hidden="true"></i>:</label>
					<select class="custom-select" wire:model="id_subsistema" id="id_subsistema">
						{{-- <option value="" selected="">Selecciona algo...</option> --}}
						@foreach ($subsistemas as $subsistema)
							<option value="{{ $subsistema->id }}">{{ $subsistema->nombre}}</option>
						@endforeach
					</select>
                    @error('id_subsistema') <div class="alert alert-danger">{{ $message }}</div> @enderror
				</div>

                <div class="form-group" wire:ignore>
                    <label for="indicador">Indicadores:</label>
                    <textarea name="indicador" wire:model="indicador" rows="10" cols="40" class="form-control tinymce-editor" id="indicador"></textarea>
                </div>

                <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button" >Siguiente</button>
            </div>
        </div>
    </div>

     {{-- Esta sería la segunda página --}}

    <div class="row setup-content {{ $currentStep != 2 ? 'displayNone' : '' }}" id="step-2">
    	<div class="col-xs-12">
    		<div class="col-md-12">
    			<h3>Paso 2</h3>
                <p>Todos los elementos con <i class="fa fa-asterisk" aria-hidden="true"></i> son requeridos.</p>
                {{-- Creando la lista de casas editoriales presentes --}}

                <div class="form-group">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
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
                                <h4>Entidades Editoras <i class="fa fa-asterisk" aria-hidden="true"></i>:</h4>
                                @foreach ($entidades as $entidad)
                                    <div class="editorial">
                                        <label>
                                            <input type="checkbox" wire:model="selected_entidades" value="{{ $entidad->id }}">
                                            {{ $entidad->nombre }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-6">
                                @if(count($selected_entidades))
                                    <h4>Entidades seleccionadas:</h4>
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

    			<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="secondStepSubmit">Siguiente</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(1)">Regresar</button>
    		</div>
    	</div>
    </div>


     {{-- Esta sería la tercera página --}}

    <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
    	<div class="col-xs-12">
    		<div class="col-md-12">
    			<h3>Paso 3</h3>
                <p>Todos los elementos con <i class="fa fa-asterisk" aria-hidden="true"></i> son requeridos.</p>
                {{-- Creando la lissta de idiomas disponibles --}}

                <div class="form-group">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <h4>Idiomas <i class="fa fa-asterisk" aria-hidden="true"></i>:</h4>
                                @foreach ($idiomas as $idioma)
                                    <div class="editorial">
                                        <label>
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

                <div class="form-group">
                    <div class="container">
                        <div class="row">
                            <div class="col-6">
                                <h4>Temas <i class="fa fa-asterisk" aria-hidden="true"></i>:</h4>
                                @foreach ($temas as $tema)
                                    <div class="editorial">
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

    			<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" wire:click="thirdStepSubmit">Siguiente</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(2)">Regresar</button>
    		</div>
    	</div>
    </div>


    {{-- Este es el resume antes de crear la revista --}}

    <div class="row setup-content {{ $currentStep != 4 ? 'displayNone' : '' }}" id="step-3">
    	<div class="col-xs-12">
    		<div class="col-md-12">
    			<h3> Resumen: </h3>

    			<table class="table">
    				<tr>
    					<td>Titulo:</td>
    					<td><strong>{{ $titulo }}</strong></td>
    				</tr>
    				<tr>
    					<td>Descripción</td>
    					<td>{!! $descripcion !!}</td>
    				</tr>
    				<tr>
    					<td>ISSN:</td>
    					<td><strong>{{ $issn }}</strong></td>
    				</tr>
    				<tr>
    					<td>ISSN-E</td>
    					<td><strong>{{ $issne }}</strong></td>
    				</tr>
                    <tr>
                        <td>Año de inicio:</td>
                        <td><strong>{{ $anio_inicio }}</strong></td>
                    </tr>
    				<tr>
    					<td>Otros indices:</td>
    					<td><strong>{{ $otros_indices}}</strong></td>
    				</tr>
                    <tr>
                        <td>Situación:</td>
                        <td><strong>{{ $situacion }}</strong></td>
                    </tr>
    				<tr>
    					<td>Arbitrada:</td>
    					<td><strong>{{ $arbitrada }}</strong></td>
    				</tr>
    				<tr>
    					<td>Soporte:</td>
    					<td><strong>{{ $soporte }}</strong></td>
    				</tr>
    				<tr>
    					<td>Tipo de revista:</td>
    					<td><strong>{{ $tipo_revista }}</strong></td>
    				</tr>
                    <tr>
                        <td>Área de conocimiento:</td>
                        <td><strong>
                            @foreach ($areas_conocimiento as $area)
                                @if ($area->id == $id_area_conocimiento)
                                    {{ $area->nombre }}
                                @endif
                            @endforeach
                        </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Frecuencia:</td>
                        <td><strong>
                            @foreach ($frecuencias as $frecuencia)
                                @if ($frecuencia->id == $id_frecuencia)
                                    {{ $frecuencia->nombre }}
                                @endif
                            @endforeach
                        </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Subsistema:</td>
                        <td><strong>
                            @foreach ($subsistemas as $subsistema)
                                @if ($subsistema->id == $id_subsistema)
                                    {{ $subsistema->nombre }}
                                @endif
                            @endforeach
                        </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Editoriales seleccionadas:</td>
                        <td>
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
                        </td>
                    </tr>
                    <tr>
                        <td>Entidades Editoras seleccionadas:</td>
                        <td>
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
                        </td>
                    </tr>
                    <tr>
                        <td>Idiomas seleccionados:</td>
                        <td>
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
                        </td>
                    </tr>
                    <tr>
                        <td>Temas seleccionados:</td>
                        <td>
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
                        </td>
                    </tr>
    			</table>

    			<button class="btn btn-success btn-lg pull-right" wire:click="myupdate" type="button">Actualizar</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">Regresar</button>
    		</div>
    	</div>
    </div>

</div>
{{-- <script type="text/javascript">
    window.addEventListener('myownapp:scroll-to', (ev) => {
        //console.log("Estoy en myownapp:scroll-to event");
      ev.stopPropagation();

      const selector = ev?.detail?.query;

      if (!selector) {
        //console.log("No selector");
        return;
      }

      const el = window.document.querySelector(selector);
      //console.log(el);

      if (!el) {
        return;
      }

      try {
        el.scrollIntoView({
          behavior: 'smooth',
        });
      } catch {}

    }, false);
</script> --}}
<script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>
{{--<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>--}}
<script type="text/javascript">
    tinymce.init({
        selector: '#descripcion',
        height: (window.innerHeight - 300),
        menubar: false,
        forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                editor.save();
            });
            editor.on('change', function (e) {
                @this.set('descripcion', editor.getContent());
            });
        },
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css',
    });

    tinymce.init({
        selector: '#indicador',
        height: (window.innerHeight - 300),
        menubar: false,
        forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                //console.log("Estoy en init change");
                editor.save();
            });
            editor.on('change', function (e) {
                @this.set('indicador', editor.getContent());
            });
        },
        plugins: [
            'advlist autolink lists link image charmap print preview anchor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | code | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css',
    });
</script>