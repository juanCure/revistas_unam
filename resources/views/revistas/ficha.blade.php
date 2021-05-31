<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1>{{ $revista->titulo }} ({{ $revista->id_revista}})</h1>
			<div id="descripcion"> {!! $revista->descripcion !!} </div>
			<p><strong>Año de inicio:</strong> {{ $revista->anio_inicio }}</p>
			<p><strong>ISSN:</strong> {{ $revista->issn }}</p>
			<p><strong>ISSN-E:</strong> {{ $revista->issne }}</p>
			<p><strong>Arbitrada: </strong> {{ $revista->arbitrada }}</p>
			<p><strong>Soporte:</strong> {{ $revista->soporte == 'Ambas' ? 'Digital e impreso' : $revista->soporte }}</p>
			<p><strong>Situación:</strong> {{ $revista->situacion }}</p>
			<p><strong>Tipo Revista:</strong> {{ $revista->tipo_revista }}</p>
			<p><strong>Frecuencia:</strong> {{ $revista->frecuencia->nombre }}</p>
			<p><strong>Área Conocimiento:</strong> {{ $revista->area_conocimiento->nombre }}</p>
			<p><strong>Subsistema:</strong> {{ $revista->subsistema->nombre }}</p>
			<div id="indicadores">
				<label><strong>Indicadores:</strong></label>
				<p>
					{!! $revista->indicador !!}
				</p>
			</div>
			<div id="editoriales">
				<label><strong>Editoriales:</strong></label>
				<ul>
					@foreach ($revista->editoriales as $editorial)
						<li>{{ $editorial->nombre }}</li>
					@endforeach
				</ul>
			</div>
			<div id="entidades">
				<label><strong>Entidades Editoras:</strong></label>
				<ul>
					@foreach ($revista->entidades_editoras as $entidad)
						<li>{{ $entidad->nombre }}</li>
					@endforeach
				</ul>
			</div>
			<div id="idiomas">
				<label><strong>Idiomas:</strong></label>
				<ul>
					@foreach ($revista->idiomas as $idioma)
						<li>{{ $idioma->nombre }}</li>
					@endforeach
				</ul>
			</div>

			<div id="temas">
				<p>
					<label><strong>Temas:</strong></label>
					@foreach ($revista->temas as $tema)
						{{ $tema->nombre }}@if(!$loop->last),@else.@endif
					@endforeach
				</p>
				{{-- <ul>
					@foreach ($revista->temas as $tema)
						<li>{{ $tema->nombre }}</li>
					@endforeach
				</ul> --}}
			</div>
			<div id="responsables">
				<label><strong>Responsables:</strong></label>
				<ul>
					@foreach ($revista->responsables as $responsable)
						<li>{{ $responsable->grado}} {{ $responsable->nombres }} {{ $responsable->apellidos }} (<strong>{{ $responsable->pivot->cargo }}</strong>); <strong>Correos:</strong> {{ $responsable->correo_electronico }}; <strong>Telefonos: </strong>{{ $responsable->telefonos }}  </li>
					@endforeach
				</ul>
			</div>

			<div id="indices">
				<p>
					<label><strong>Sistemas Indexadores:</strong></label>
					@foreach ($revista->sistemas_indexadores as $indice)
						{{ $indice->nombre }}@if(!$loop->last),@else.@endif
					@endforeach
				</p>
			</div>


			<p><strong>Otros_indices:</strong> {{ $revista->otros_indices}}</p>
		</div>
    </div>
</div>