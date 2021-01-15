@extends('layouts.master')
@section('content')
	<h1>Crear revista</h1>
	<form method="POST" action="{{ route('revistas.store') }}">
		@csrf
		<div class="form-row">
			<label>Titulo:</label>
			<input class="form-control" type="text" name="titulo" value="{{ old('titulo') }}">
		</div>
		<div class="form-row">
			<label>Descripción:</label>
			<input class="form-control" type="text" name="descripcion" value="{{ old('descripcion') }}">
		</div>
		<div class="form-row">
			<label>ISSN:</label>
			<input class="form-control" type="text" name="issn" value="{{ old('issn') }}">
		</div>
		<div class="form-row">
			<label>ISSN-e:</label>
			<input class="form-control" type="text" name="issne" value="{{ old('issne') }}">
		</div>
		<div class="form-row">
			<label>Anio Inicio:</label>
			<input class="form-control" type="text" name="anio_inicio" value="{{ old('anio_inicio') }}">
		</div>
		<div class="form-row">
			<label>Otros indices:</label>
			<input class="form-control" type="text" name="otros_indices" value="{{ old('otros_indices') }}">
		</div>
		<div class="form-row">
			<label>Editorial:</label>
			<input class="form-control" type="text" name="editorial" value="{{ old('editorial') }}">
		</div>
		<div class="form-row">
			<label>Situación:</label>
			<select class="custom-select" name="situacion">
				<option value="" selected="">Selecciona algo...</option>
				<option {{ old('situacion') == 'vigente' ? 'selected' : '' }} value="vigente">Vigente</option>
				<option {{ old('situacion') == 'descontinuada' ? 'selected' : '' }} value="descontinuada">Descontinuada</option>
			</select>
		</div>
		<div class="form-row">
			<label>Arbitrada:</label>
			<select class="custom-select" name="arbitrada">
				<option value="" selected="">Selecciona algo...</option>
				<option {{ old('arbitrada') == 'Si' ? 'selected' : '' }} value="Si">Si</option>
				<option {{ old('arbitrada') == 'No' ? 'selected' : '' }} value="No">No</option>
			</select>
		</div>
		<div class="form-row">
			<label>Tipo Revista:</label>
			<select class="custom-select" name="id_tipo_revista">
				<option value="" selected="">Selecciona algo...</option>
				<option {{ old('id_tipo_revista') == '1' ? 'selected' : '' }} value="1">Cultural</option>
				<option {{ old('id_tipo_revista') == '2' ? 'selected' : '' }} value="2">Divulgación</option>
				<option {{ old('id_tipo_revista') == '3' ? 'selected' : '' }} value="3">Investigación</option>
				<option {{ old('id_tipo_revista') == '4' ? 'selected' : '' }} value="4">Técnico-Profesional</option>
			</select>
		</div>
		<div class="form-row">
			<label>Areas de conocimiento:</label>
			<select class="custom-select" name="id_area_conocimiento">
				<option value="" selected="">Selecciona algo...</option>
				<option {{ old('id_area_conocimiento') == '1' ? 'selected' : '' }} value="1">Biología y Química</option>
				<option {{ old('id_area_conocimiento') == '2' ? 'selected' : '' }} value="2">Biotecnología y Ciencias Agropecuarias</option>
				<option {{ old('id_area_conocimiento') == '3' ? 'selected' : '' }} value="3">Biotecnología y Ciencias Agropecuarias</option>
				<option {{ old('id_area_conocimiento') == '4' ? 'selected' : '' }} value="4">Físico Matemáticas y Ciencias de la Tierra</option>
			</select>
		</div>
		<div class="form-row">
			<label>Soportes:</label>
			<select class="custom-select" name="id_soporte">
				<option value="" selected="">Selecciona algo...</option>
				<option {{ old('id_soporte') == '1' ? 'selected' : '' }} value="1">Ambas</option>
				<option {{ old('id_soporte') == '2' ? 'selected' : '' }} value="2">Electrónica</option>
				<option {{ old('id_soporte') == '3' ? 'selected' : '' }} value="3">Impresa</option>
			</select>
		</div>
		<div class="form-row">
			<label>Frecuencias:</label>
			<select class="custom-select" name="id_frecuencia">
				<option value="" selected="">Selecciona algo...</option>
				<option {{ old('id_frecuencia') == '1' ? 'selected' : '' }} value="1">Mensual</option>
				<option {{ old('id_frecuencia') == '2' ? 'selected' : '' }} value="2">Semestral</option>
				<option {{ old('id_frecuencia') == '3' ? 'selected' : '' }} value="3">Trimestral</option>
			</select>
		</div>
		<div class="form-row">
			<label>Subsistema:</label>
			<select class="custom-select" name="id_subsistema">
				<option value="" selected="">Selecciona algo...</option>
				<option {{ old('id_subsistema') == '1' ? 'selected' : '' }} value="1">Administración Central</option>
				<option {{ old('id_subsistema') == '2' ? 'selected' : '' }} value="2">Facultades y Escuelas</option>
				<option {{ old('id_subsistema') == '3' ? 'selected' : '' }} value="3">Coordinación de Humanidades</option>
			</select>
		</div>
		<div class="form-row mt-3">
			<button type="submit" class="btn btn-primary btn-lg">Crear revista</button>
		</div>
	</form>
@endsection