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
                    <td>Responsables:</td>
                    <td><strong>
                        @if(count($selected_responsables))
                            <ul>
                                @foreach ($selected_responsables as $responsable)
                                    <li><strong>({{ $responsable['role'] }})</strong> {{ $responsable['responsable']['grado'] }} {{ $responsable['responsable']['nombres'] }} {{ $responsable['responsable']['apellidos'] }}</li>
                                @endforeach
                            </ul>
                        @endif
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

                <tr>
                    <td>Índices:</td>
                    <td>
                        <ul>
                            @foreach ($selected_indices as $indice)
                                <li>{{ $indice['nombre'] }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>

                <tr>
                    <td>Otros indices:</td>
                    <td><strong>{{ $otros_indices}}</strong></td>
                </tr>
            </table>

            <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Crear</button>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">Regresar</button>
        </div>
    </div>
</div>