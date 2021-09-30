@extends('layouts.app')
@section('content')
	<div class="container-fluid">
		<div class="resultados">
			<h2>Búsqueda básica por artículo</h2>
			<p>Resultados: {{$numRevistas}} artículos encontrados</p>
		</div>
		<div class="d-flex justify-content-center">
			<p> Resultado por: {{$palabra}}</p>
		</div>
		<div class="resultados_contenido">
			<p class="elementos">Mostrando {{ $mypaginator->firstItem() }} a {{ $mypaginator->lastItem() }} de {{ $numRevistas }} artículos</p>
			{{ $mypaginator->links() }}
			@foreach($revistas as $revista)
				<div class="articulo_detalles card">
					<div class="card-body">
						<h5 class="card-title">
							{{ $revista['collection'] }}
						</h5>
						<p class="card-text">{{ $revista['title']}}</p>
						<p class="card-text">{{ $revista['author_facet'] }}</p>
					</div>
				</div>
			@endforeach

			{{ $mypaginator->links() }}
		</div>

	</div>
@endsection