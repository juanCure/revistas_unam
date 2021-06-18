<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
			<h1>Revistas
				<a class="btn btn-success mb-3" href="{{ route('revistas.create') }}">Crear</a>
			</h1>
			<div class="form-row">
				<div class="col-md-4">
					<input type="text" class="form-control" placeholder="Buscar" wire:model="searchTerm" />
				</div>
			</div>

			@if(count($revistas ?? '') == 0)
				<div class="alert alert-warning">
					La lista de revistas es vacia
				</div>
			@else
				<div class="table-responsive mt-3">
					{{ $revistas->links() }}
					<table class="table table-bordered mt-5" style="margin: 10px 0 10px 0;">
						<thead class="thead-light">
							<tr>
								<th>Título</th>
								<th>ISSN</th>
								<th>ISSN-e</th>
								<th>Tipo de revista</th>
								<th>Área de conocimiento</th>
								<th>Entidades Académicas</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($revistas ?? '' as $revista)
								<tr>
									<td>{{ $revista->titulo }}</td>
									{{-- <td><div id="descripcion"> {!! $revista->descripcion !!} </div></td> --}}
									<td>{{ $revista->issn }}</td>
									<td>{{ $revista->issne }}</td>
									<td>{{ $revista->tipo_revista }}</td>
									<td>{{ $revista->area_conocimiento->nombre}}</td>
									<td>
										<ul>
											@foreach ($revista->entidades_editoras as $entidad)
												<li><a href="{{ route('revistas.entidad', ['entidad_id' => $entidad->id])}}"> {{ $entidad->nombre }} </a></li>
											@endforeach
										</ul>
									</td>
									{{-- <td>
			                            <button wire:click="edit({{ $area->id }})" class="btn btn-primary btn-sm">Edit</button>
			                            <button wire:click="delete({{ $area->id }})" class="btn btn-danger btn-sm">Delete</button>
			                            <button wire:click="$emit('confirm_remove', {{ $area->id }})" class="btn btn-danger btn-sm">Delete</button>
			                        </td> --}}
									<td>
										<a class="btn btn-primary btn-sm" href="{{ route('revistas.edit', ['revista' => $revista->id_revista]) }}">Editar</a>

										<form method="POST" class="d-inline" action="{{ route('revistas.destroy', ['revista' => $revista->id_revista]) }}">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
										</form>
										<a href="{{ route('revistas.show', ['revista' => $revista->id_revista]) }}"><i class="fas fa-eye"></i></a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
					{{ $revistas->links() }}
				</div>
			@endif
		</div>
    </div>
</div>