@extends('layouts.master')
@section('content')
	<h1>Lista de revistas</h1>

	<a class="btn btn-success mb-3" href="{{ route('revistas.create') }}">Crear revista</a>

	@empty ($revistas)
		<div class="alert alert-warning">
			La lista de revistas es vacia
		</div>
	@else
		<div class="table-responsive">
			<table class="table table-striped">
				<thead class="thead-light">
					<tr>
						<th>id</th>
						<th>Título</th>
						<th>Descripción</th>
						<th>issn</th>
						<th>issne</th>
						<th>editorial</th>
						<th>otros_indices</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($revistas as $revista)
						<tr>
							<td>{{ $revista->id_revista}}</td>
							<td>{{ $revista->titulo }}</td>
							<td>{{ $revista->descripcion }}</td>
							<td>{{ $revista->issn }}</td>
							<td>{{ $revista->issne }}</td>
							<td>{{ $revista->editorial }}</td>
							<td>{{ $revista->otros_indices }}</td>
							<td>
								<a class="btn btn-link" href="{{ route('revistas.show', ['revista' => $revista->id_revista]) }}">Ver</a>
								<a class="btn btn-link" href="{{ route('revistas.edit', ['revista' => $revista->id_revista]) }}">Editar</a>

								<form method="POST" class="d-inline" action="{{ route('revistas.destroy', ['revista' => $revista->id_revista]) }}">
									@csrf
									@method('DELETE')
									<button type="submit" class="btn btn-link">Eliminar</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	@endempty
@endsection