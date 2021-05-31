@extends('layouts.app')
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
			<textarea name="descripcion" rows="10" cols="40" class="form-control tinymce-editor">{{ old('descripcion') }}</textarea>
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
			<select class="custom-select" name="editoriales[]" multiple>
				<option value="" selected="">Selecciona algo...</option>
				@foreach ($editoriales as $editorial)
					<option value="{{ $editorial->id }}" {{ (collect(old('editoriales'))->contains($editorial->id)) ? 'selected':'' }}> {{ $editorial->nombre }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-row">
			<label>Situación:</label>
			<select class="custom-select" name="situacion">
				<option value="" selected="">Selecciona algo...</option>
				<option {{ old('situacion') == 'Vigente' ? 'selected' : '' }} value="Vigente">Vigente</option>
				<option {{ old('situacion') == 'Descontinuada' ? 'selected' : '' }} value="Descontinuada">Descontinuada</option>
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
			<select class="custom-select" name="tipo_revista">
				<option value="" selected="">Selecciona algo...</option>
				<option {{ old('tipo_revista') == 'Cultural' ? 'selected' : '' }} value="Cultural">Cultural</option>
				<option {{ old('tipo_revista') == 'Divulgación' ? 'selected' : '' }} value="Divulgación">Divulgación</option>
				<option {{ old('tipo_revista') == 'Investigación' ? 'selected' : '' }} value="Investigación">Investigación</option>
				<option {{ old('tipo_revista') == 'Técnico-Profesional' ? 'selected' : '' }} value="Técnico-Profesional">Técnico-Profesional</option>
			</select>
		</div>
		<div class="form-row">
			<label>Areas de conocimiento:</label>
			<select class="custom-select" name="id_area_conocimiento">
				<option value="" selected="">Selecciona algo...</option>
				<option {{ old('id_area_conocimiento') == '1' ? 'selected' : '' }} value="1">Biología y Química</option>
				<option {{ old('id_area_conocimiento') == '2' ? 'selected' : '' }} value="2">Biotecnología y Ciencias Agropecuarias</option>
				<option {{ old('id_area_conocimiento') == '3' ? 'selected' : '' }} value="3">Ciencias Sociales y Económicas</option>
				<option {{ old('id_area_conocimiento') == '4' ? 'selected' : '' }} value="4">Físico Matemáticas y Ciencias de la Tierra</option>
			</select>
		</div>
		<div class="form-row">
			<label>Soportes:</label>
			<select class="custom-select" name="soporte">
				<option value="" selected="">Selecciona algo...</option>
				<option {{ old('soporte') == 'Ambas' ? 'selected' : '' }} value="Ambas">Ambas</option>
				<option {{ old('soporte') == 'Electrónica' ? 'selected' : '' }} value="Electrónica">Electrónica</option>
				<option {{ old('soporte') == 'Impresa' ? 'selected' : '' }} value="Impresa">Impresa</option>
			</select>
		</div>
		<div class="form-row">
			<label>Frecuencias:</label>
			<select class="custom-select" name="id_frecuencia">
				<option value="" selected="">Selecciona algo...</option>
				@foreach ($frecuencias as $frecuencia)
					<option {{ old('id_frecuencia') == '$frecuencia->id' ? 'selected' : '' }} value="{{ $frecuencia->id }}">{{ $frecuencia->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-row">
			<label>Subsistema:</label>
			<select class="custom-select" name="id_subsistema">
				<option value="" selected="">Selecciona algo...</option>
				@foreach ($subsistemas as $subsistema)
					<option {{ old('id_subsistema') == '$subsistema->id' ? 'selected' : '' }} value="{{ $subsistema->id }}">{{ $subsistema->nombre}}</option>
				@endforeach
			</select>
		</div>
		<div class="form-row mt-3">
			<button type="submit" class="btn btn-primary btn-lg">Crear revista</button>
		</div>
	</form>
	<script src="{{ asset('node_modules/tinymce/tinymce.min.js') }}"></script>
	<script type="text/javascript">
		tinymce.init({
            selector: 'textarea.tinymce-editor',
            height: 100,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_css: '//www.tiny.cloud/css/codepen.min.css'
        });
	</script>
@endsection