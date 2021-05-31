{{--@extends('layouts.master')--}}
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<h1>Revistas</h1>

			<a class="btn btn-success mb-3" href="{{ route('revistas.create') }}">Crear revista</a>

			@if(count($revistas ?? '') == 0)
				<div class="alert alert-warning">
					La lista de revistas es vacia
				</div>
			@else
				<div class="table-responsive">
					<table class="table table-striped">
						<thead class="thead-light">
							<tr>
								<th>Id</th>
								<th>Título</th>
								<th>Descripción</th>
								<th>ISSN</th>
								<th>ISSN-e</th>
								<th>Otros Indices</th>
								<th>Indicadores</th>
								<th>Ficha</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($revistas ?? '' as $revista)
								<tr>
									<td>{{ $revista->id_revista}}</td>
									<td>{{ $revista->titulo }}</td>
									<td><div id="descripcion"> {!! $revista->descripcion !!} </div></td>
									<td>{{ $revista->issn }}</td>
									<td>{{ $revista->issne }}</td>
									<td>{{ $revista->otros_indices }}</td>
									<td>{!! $revista->indicador !!}</td>
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
			@endif
		</div>
    </div>
</div>
@endsection