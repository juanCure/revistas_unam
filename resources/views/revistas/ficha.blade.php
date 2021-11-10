<section>
    <h6>Descripción</h6>
    {!! $revista->descripcion !!}
</section>
<section>
    <div class="row metadata_row">
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center align-items-xl-center data_span data_label">Situación</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value value_ok">{{ $revista->situacion }}<br></span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center align-items-xl-center data_span data_label">Arbitrada</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value value_ok">{{ $revista->arbitrada }}<br></span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center align-items-xl-center data_span data_label">Tipo de revista</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value">{{ $revista->tipo_revista }}<br></span></div>
        <div class="col-12 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center data_span data_label">Área de conocimiento</span></div>
        <div class="col-12 col-sm-12 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value">{{ $revista->area_conocimiento->nombre }}<br></span></div>
        <div class="col-12 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center data_span data_label">Temas</span></div>
        <div class="col-12 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value">
            @foreach ($revista->temas as $tema)
                        {{ $tema->nombre }}@if(!$loop->last),@else.@endif
                    @endforeach
            <br></span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center align-items-xl-center data_label">Año de incio</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="data_value">{{ $revista->anio_inicio }}</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center data_span data_label">Frecuencia</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value">{{ $revista->frecuencia->nombre }}<br></span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center align-items-xl-center data_span data_label">Soporte</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value">{{ $revista->soporte == 'Ambas' ? 'Digital e impreso' : $revista->soporte }}<br></span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center data_span data_label">Idiomas</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start">
            <ul class="data_value_list">
                @foreach ($revista->idiomas as $idioma)
                    <li><span class="data_value">{{ $idioma->nombre }}<br></span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center align-items-xl-center data_span data_label">ISSN</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex justify-content-center align-items-center data_span data_value">{{ $revista->issn }}</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center align-items-xl-center data_span data_label">ISSN-E</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value">{{ $revista->issne }}<br></span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center align-items-xl-center data_span data_label">Tipo de Licencia</span></div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value">Licencia Creative Commons Atribución-NoComercial 4.0 Internacional.<br></span></div>
        <div class="col-12 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center data_span data_label">Editoriales</span></div>
        <div class="col-12 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start">
            <ul class="data_value_list">
                @foreach ($revista->editoriales as $editorial)
                    <li><span class="data_value">{{ $editorial->nombre }}</span></li>
                @endforeach
            </ul></div>
        <div class="col-12 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center data_span data_label">Entidades Editoras</span></div>
        <div class="col-12 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start">
            <ul class="data_value_list">
                @foreach ($revista->entidades_editoras as $entidad)
                    <li><span class="data_value">{{ $entidad->nombre }}</span></li>
                @endforeach
            </ul>
        </div>
        <div class="col-12 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center data_span data_label">Subsistema</span></div>
        <div class="col-12 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value">{{ $revista->subsistema->nombre }}<br></span></div>
        <div class="col-12 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center data_span data_label">Responsables</span></div>
        <div class="col-12 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start">
            <ul class="data_value_list">
                @foreach ($revista->responsables as $responsable)
                    <li><span class="data_value">{{ $responsable->grado}} {{ $responsable->nombres }} {{ $responsable->apellidos }} (<strong>{{ $responsable->pivot->cargo }}</strong>); <strong>Correos:</strong> {{ $responsable->correo_electronico }}; <strong>Telefonos: </strong>{{ $responsable->telefonos }}</span>  </li>
                @endforeach
            </ul>
        </div>
        <div class="col-12 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center data_span data_label">Principales Índices</span></div>
        <div class="col-12 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value">@foreach ($revista->sistemas_indexadores as $indice)
                        {{ $indice->nombre }}@if(!$loop->last),@else.@endif
                    @endforeach<br></span></div>
        <div class="col-12 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center data_span data_label">Otros índices</span></div>
        <div class="col-12 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start"><span class="d-flex align-items-center data_value"> {{ $revista->otros_indices}}<br></span></div>
        <div class="col-12 col-lg-3 col-xl-2 d-flex justify-content-start align-items-center justify-content-sm-start data_label_col"><span class="d-flex align-items-center data_span data_label">Indicadores</span></div>
        <div class="col-12 col-lg-9 col-xl-10 d-flex justify-content-start align-items-center justify-content-sm-start">
            {!! $revista->indicador !!}
        </div>

    </div>
</section>