@extends('layouts.master')
@section('content')
	<h1>{{ $revista->titulo }} ({{ $revista->id_revista}})</h1>
	<p>{{ $revista->descripcion }}</p>
	<p>Año de inicio: {{ $revista->anio_inicio }}</p>
	<p>Arbitrada: {{ $revista->arbitrada }}</p>
	<p>ISSN: {{ $revista->issn }}</p>
	<p>ISSN-E: {{ $revista->issne }}</p>
	<p>Otros_indices: {{ $revista->otros_indices}}</p>
	<p>Editorial: {{ $revista->editorial }}</p>
	<p>Situación: {{ $revista->situacion }}</p>
	<p>Frecuencia: {{ $revista->id_frecuencia }}</p>
	<p>Soporte: {{ $revista->id_soporte }}</p>
	<p>Tipo Revista: {{ $revista->id_tipo_revista }}</p>
	<p>Área Conocimiento: {{ $revista->id_area_conocimiento }}</p>
	<p>Subsistema: {{ $revista->id_subsistema }}</p>
@endsection