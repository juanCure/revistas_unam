@if(count($revistas ?? '') == 0)
	<div class="alert alert-warning">
		No se encontraron resultados
	</div>
@else
	<div id="revistas_resultado">
		<p>Mostrando {{ $revistas->firstItem() }} a {{ $revistas->lastItem() }} de {{$revistas->total() }}</p>
		{{-- Carga los enlaces de paginación --}}
		{{ $revistas->links() }}
		<table class="table table-striped">
			<thead class="thead-light">
				<tr>
					<th>@sortablelink('titulo', 'Título')</th>
					<th>@sortablelink('tipo_revista', 'Tipo de revista')</th>
					<th>@sortablelink('area_conocimiento.nombre', 'Área del conocimiento')</th>
					<th>Entidades Acádemicas</th>
					<th>Indexación</th>
					<th class="text-center">Indicador</th>
					<th>Ficha</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($revistas as $revista)
					<tr>
						<td><a target="_blank" href="{{ $revista->ojs_ruta }}"> {{ $revista->titulo }} </a></td>
						<td><a href="{{ route('revistas.tipo', ['tipo' => $revista->tipo_revista])}}">
							{{ $revista->tipo_revista }}
						</a></td>
						<td><a href="{{ route('revistas.area', ['area_id' => $revista->area_conocimiento->id])}}"> {{ $revista->area_conocimiento->nombre }} </a></td>
						<td>
							<ul>
								@foreach ($revista->entidades_editoras as $entidad)
									<li><a href="{{ route('revistas.entidad', ['entidad_id' => $entidad->id])}}"> {{ $entidad->nombre }} </a></li>
								@endforeach
							</ul>
						</td>
						<td>
							<ul>
								@foreach ($revista->sistemas_indexadores as $indexador)
									<li><a href="{{ route('revistas.indexaciones', ['indice_id' => $indexador->id])}}"> {{ $indexador->nombre }} </a></li>
								@endforeach
							</ul>
						</td>
						<td>
							{!! $revista->indicador !!}
						</td>
						<td>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fichaRevistaModal" data-id="{{ $revista->id_revista }}">
							  Ver
							</button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{-- Carga los enlaces de paginación --}}
		{{ $revistas->links() }}
	</div> {{-- Fin de revistas_resultados --}}
@endif
