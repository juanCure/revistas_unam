@extends('layouts.app')
@section('content')
@include('revistas.ficha')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1>{{ $revista->titulo }} ({{ $revista->id_revista}})</h1>
			<div id="descripcion"> {!! $revista->descripcion !!} </div>
			<p><strong>Año de inicio:</strong> {{ $revista->anio_inicio }}</p>
			<p><strong>ISSN:</strong> {{ $revista->issn }}</p>
			<p><strong>ISSN-E:</strong> {{ $revista->issne }}</p>
			<p><strong>Otros_indices:</strong> {{ $revista->otros_indices}}</p>
			<p><strong>Arbitrada: </strong> {{ $revista->arbitrada }}</p>
			<p><strong>Soporte:</strong> {{ $revista->soporte == 'Ambas' ? 'Digital e impreso' : $revista->soporte }}</p>
			<p><strong>Situación:</strong> {{ $revista->situacion }}</p>
			<p><strong>Tipo Revista:</strong> {{ $revista->tipo_revista }}</p>
			<p><strong>Frecuencia:</strong> {{ $revista->frecuencia->nombre }}</p>
			<p><strong>Área Conocimiento:</strong> {{ $revista->area_conocimiento->nombre }}</p>
			<p><strong>Subsistema:</strong> {{ $revista->subsistema->nombre }}</p>
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
				<label><strong>Temas:</strong></label>
				<ul>
					@foreach ($revista->temas as $tema)
						<li>{{ $tema->nombre }}</li>
					@endforeach
				</ul>
			</div>
		</div>
    </div>
</div> --}}
@endsection