@extends('layouts.app')
@section('content')
	<h1>Editando una nueva área</h1>
	<form method="POST" action="{{ route('areas_conocimiento.update', ['areas_conocimiento' => $areas_conocimiento->id]) }}">
		@csrf
		@method('PUT')
		<div class="form-row">
			<label>Nombre:</label>
			<input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}">
		</div>
		<div class="form-row mt-3">
			<button type="submit" class="btn btn-primary btn-lg">Editar área</button>
		</div>
	</form>
@endsection