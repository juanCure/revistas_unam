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
                <a href="#step-4" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}">4</a>
                <p>Paso 4</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-5" type="button" class="btn btn-circle {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}">5</a>
                <p>Paso 5</p>
            </div>
	        <div class="stepwizard-step">
	            <a href="#step-6" type="button" class="btn btn-circle {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}" disabled="disabled">6</a>
	            <p>Resumen</p>
	        </div>
	    </div>
	</div>
	{{-- Paso 1 Metadatos principales de la revista --}}

    @include('livewire.revistas.step1')

    {{-- Paso 2 Asociar los responsables de la revista --}}

    @include('livewire.revistas.step2')

    {{-- Paso 3 Asociar las editoriales y entidades editoras --}}

    @include('livewire.revistas.step3')

    {{-- Paso 4 Asociar idiomas y temas --}}

    @include('livewire.revistas.step4')

    {{-- Paso 5 Asociar los sistemas indexadores --}}

    {{-- Paso 6 Resumen de la revista antes de ser guardada --}}

    <div class="row setup-content {{ $currentStep != 6 ? 'displayNone' : '' }}" id="step-6">
        <div class="col-xs-12">
            <div class="col-md-12">
                <h3> Resumen</h3>

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

                <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Crear</button>
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">Regresar</button>
            </div>
        </div>
    </div>
</div>


<script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    // selector: 'textarea.tinymce-editor',
    // Editor para el campo descripción
    tinymce.init({
        selector: '#descripcion',
        height: (window.innerHeight - 300),
        menubar: false,
        forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                // console.log("Estoy en init change");
                editor.save();
            });
            editor.on('change', function (e) {
                // console.log("Estoy en change", editor.getContent());
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
            'removeformat | code | help',
        content_css: '//www.tiny.cloud/css/codepen.min.css',
    });
    // Editor para el campo indicadores
    tinymce.init({
        selector: '#indicador',
        height: (window.innerHeight - 300),
        menubar: false,
        forced_root_block: false,
        setup: function (editor) {
            editor.on('init change', function () {
                // console.log("Estoy en init change");
                editor.save();
            });
            editor.on('change', function (e) {
                // console.log("Estoy en change", editor.getContent());
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
