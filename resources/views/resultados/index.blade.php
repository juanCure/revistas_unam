<div class="col-12">
    <div class="row" id="results_report_col">
        <div class="col d-flex d-xl-flex justify-content-center justify-content-sm-start justify-content-md-start align-items-xl-center"><span class="d-sm-flex align-items-sm-end align-items-md-end" id="results_counter">
        	Mostrando {{ $revistas->firstItem() }} a {{ $revistas->lastItem() }} de {{$revistas->total() }}</div>
        <div class="col d-md-flex d-lg-flex justify-content-md-end justify-content-lg-end">
            {{-- Carga los enlaces de paginación --}}
			{{ $revistas->links() }}
        </div>
    </div>
</div>
<div class="col-12" style="margin-bottom: 10px;padding-bottom: 10px;border-bottom: solid 1px var(--link);">
	<div class="table-responsive text-sm-center" id="results_table">
		<table class="table table-striped table-hover" id="results-table">
			<thead id="table_header">
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
						<td><a target="_blank" href="{{ $revista->ojs_ruta }}"> {{ $revista->titulo }} <i class="typcn typcn-export"></i></a></td>
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
							@foreach ($revista->sistemas_indexadores as $indexador)
								<a href="{{ route('revistas.indexaciones', ['indice_id' => $indexador->id])}}">
									<img src="{{ asset($indexador->imagen )}}">
								</a>
							@endforeach
							<ul>

							</ul>
						</td>
						<td class="d-lg-flex justify-content-lg-center align-items-lg-center">
							<!-- Anchor trigger modal -->
							{{-- <a data-toggle="modal" data-id="{{ $revista->id_revista }}" href="#indicadorModal" class="list-group-item"><i class="fas fa-tachometer-alt fa-lg"></i></a> --}}
							@if(isset($revista->indicador))
								<a data-toggle="modal" data-id="{{ $revista->id_revista }}" href="#indicadorModal"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-speedometer2" style="font-size: 2em;">
	                                <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"></path>
	                                <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"></path>
	                            </svg></a>
                            @endif
						</td>
						<td>
							<!-- Button trigger modal -->
							{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fichaRevistaModal" data-id="{{ $revista->id_revista }}">
							  Ver
							</button> --}}
							<button type="button" class="btn" data-toggle="modal" data-target="#fichaRevistaModal" data-id="{{ $revista->id_revista }}"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-card-heading" style="font-size: 2em;">
                                <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"></path>
                                <path d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z"></path>
                            </svg></button>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<div class="col-12 d-flex justify-content-center align-items-center justify-content-sm-end">
    <div class="row d-flex align-items-center">
        <div class="col d-flex d-xl-flex align-items-center justify-content-xl-end align-items-xl-center">
            {{-- Carga los enlaces de paginación --}}
			{{ $revistas->links() }}
        </div>
    </div>
</div>