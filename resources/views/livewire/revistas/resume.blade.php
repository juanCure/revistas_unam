<div class="container">
    <div class="row setup-content mt-3 {{ $currentStep != 6 ? 'displayNone' : '' }}" id="step-6">
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
                    @if(isset($ojs_ruta) && $ojs_ruta != "")
                        <tr>
                            <td>Ruta de la revista:</td>
                            <td><strong>{{ $ojs_ruta }}</strong></td>
                        </tr>
                    @endif
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
                            <strong>
                                @if(count($selected_editoriales))
                                    <ul>
                                        @foreach ($selected_editoriales as $editorial)
                                            <li> {{ $editorial['nombre']}} </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Entidades Editoras seleccionadas:</td>
                        <td>
                            <strong>
                                @if(count($selected_entidades))
                                    <ul>
                                        @foreach ($selected_entidades as $entidad)
                                            <li> {{ $entidad['nombre']}} </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Idiomas seleccionados:</td>
                        <td>
                            <strong>
                                @if(count($selected_idiomas))
                                    <ul>
                                        @foreach ($selected_idiomas as $idioma)
                                            <li> {{ $idioma['nombre']}} </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </strong>
                        </td>
                    </tr>
                    <tr>
                        <td>Temas seleccionados:</td>
                        <td>
                            <strong>
                                @if(count($selected_temas))
                                    <ul>
                                        @foreach ($selected_temas as $tema)
                                            <li> {{ $tema['nombre']}} </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </strong>
                        </td>
                    </tr>

                    <tr>
                        <td>Índices:</td>
                        <td>
                            <strong>
                                <ul>
                                    @foreach ($selected_indices as $indice)
                                        <li>{{ $indice['nombre'] }}</li>
                                    @endforeach
                                </ul>
                            </strong>
                        </td>
                    </tr>

                    <tr>
                        <td>Otros indices:</td>
                        <td><strong>{{ $otros_indices}}</strong></td>
                    </tr>
                </table>

                @if (isset($updateMode) and $updateMode)
                    <button class="btn btn-success btn-lg pull-right" wire:click="myUpdate" type="button">Actualizar</button>
                @else
                    <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Crear</button>
                @endif
                <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(5)">Regresar</button>
            </div>
        </div>
    </div>
</div>