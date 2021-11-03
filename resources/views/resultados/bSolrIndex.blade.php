<div class="row">
	{{-- filtros --}}
	<div class="col-md-3">
		<div class="filtros">
			<p>Filtros de búsqueda</p>
			<div id="publishDate">
				<p>Año de publicación</p>
				@foreach($publishDateArray as $item)

					<div class="form-check">
					  <input id="checkbox_{{ $item['checkbox_id'] }}" name="pub_date" class="form-check-input" type="checkbox" value="{{ $item['checkbox_id'] }}" onchange="doSomething(this)" {{ $item['is_checked'] ? 'checked' : '' }}>
					  <label class="form-check-label">
					    {{ $item['checkbox_id'] }}
					  </label>
					  <label>({{ $item['count'] }})</label>
					</div>
				@endforeach

			</div>
			<br><br>
			<div id="revistas">
				<span>Revistas</span>
				@foreach ($journalsArray as $item)
					<div class="form-check">
					  <input id="checkbox_{{ $item['checkbox_id'] }}" name="journals" class="form-check-input" type="checkbox" value="{{ $item['checkbox_id'] }}" onchange="doSomething(this)" {{ $item['is_checked'] ? 'checked' : '' }}>
					  <label class="form-check-label">
					    {{ $item['checkbox_id'] }}
					  </label>
					  <label>({{ $item['count'] }})</label>
					</div>
				@endforeach
			</div>
			{{-- <div id="revistas">
				<span>Revistas</span>
				@foreach ($unFilteredJournalsFacet as $value => $count)
					<div class="form-check">
					  <input name="journal" class="form-check-input" type="checkbox" value="{{$value}}">
					  <label class="form-check-label">
					    {{$value}}
					  </label>
					  <label>({{$count}})</label>
					</div>
				@endforeach
			</div> --}}
		</div>

	</div>
	{{-- Resultados --}}
	<div class="col-md-9">
		<div class="resultados">
			<h2>Búsqueda básica por artículo</h2>
			<p>Resultados: {{$numFound}} artículos encontrados</p>
		</div>
		<div class="d-flex justify-content-center">
			<p>Resultado por: <span id="searchText">{{$searchTerm}}</span></p>
		</div>
		<div class="resultados_contenido">
			<p class="elementos">Mostrando {{ $mypaginator->firstItem() }} a {{ $mypaginator->lastItem() }} de {{ $numFound }} artículos</p>
			{{ $mypaginator->links() }}
			@foreach($resultset as $document)
				<div class="articulo_detalles card">
					<div class="card-body">
						<h5 class="card-title">
							{{-- Mostrando el título de la revista --}}
							{{ $document['collection'] }}
						</h5>
						<p><span>Año: </span><span>{{ (isset($document['publishDate'])) ? $document['publishDate'] : '' }}</span></p>
						<p><span>ISSN: </span><span>{{ $document['myownissn']}}</span></p>
						<p class="card-text">{{ $document['title']}}</p>
						<p class="card-text">{{ $document['author_facet'] }}</p>
						{{-- <p class="card-text"><span>DOI: </span> <a href=""> {{ $document['doi'] != null ? $document['doi'] : '' }} </a></p> --}}
						@if ($document['doi'] != null)
							<div id="doi_container">
								<span>DOI: </span>
									<a target="_blank" href="https://doi.org/{{ $document['doi'] }}">
										https://doi.org/{{ $document['doi'] }}
									</a>
							</div>
						@endif
					</div>
				</div>
			@endforeach

			{{ $mypaginator->links() }}
		</div>
	</div>
</div>