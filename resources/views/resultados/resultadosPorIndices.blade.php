@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<h1>Resultados</h1>
    <div class="row">
        {{-- <div class="col-md-12"> --}}
        	@include('public_sidebar')
        	{{-- Incluyendo la vista modal de la ficha --}}
        	@include('resultados.ficha')
    		<div class="col-md-9">
    			<ol class="breadcrumb">
    				<li><a href="{{ route('inicio') }}">
    					<span>Inicio > </span>
    				</a></li>
    				<li> {{ $breadcrumb }}</li>
    			</ol>
    			<div class="row">
    				<div class="col-md-12">
    					<form id="form_revista" method="GET">
    						{{-- @csrf --}}
    						<div class="alfabeto">
			    				@foreach ($alfabeto as $letra)
			    					<label class="alfabeto">
			    						{{ $letra }}
			    						<input class="form-control abecedario" type="radio" name="abc" value="{{ $letra }}" onchange="data_ajax('{{ route('revistas.listado') }}', '#form_revista', '#revistas_resultado')">
			    					</label>
					        	@endforeach
			    			</div>
    						{{-- Hidden Box Select para enviar los filtros iniciales --}}
    						<div class="row">
    							<select name="tipo" id="tipo" style="display: none;">
    								<option value selected="selected">Todos</option>
    								@foreach ($tipos_revistas as $revista)
    									<option {{ ($filtro == $revista->tipo_revista && ($accion == 'revistasPorTipo' || $accion == 'listado')) ? 'selected' : '' }} value="{{ $revista->tipo_revista}}">{{ $revista->tipo_revista}}</option>
    								@endforeach
    							</select>

    							<select name="area_id" id="area_id" style="display: none;">
    								<option value selected="selected">Todos</option>
    								@foreach ($areas_conocimiento as $area)
    									<option {{ ($filtro == $area->id && $accion == 'revistasPorArea') ? 'selected' : '' }} value="{{ $area->id}}"> {{ $area->nombre }} </option>
    								@endforeach
    							</select>

    							<select name="indice_id" id="indice_id" style="display: none;">
    								{{-- <option value="all">Todos</option> --}}
    								<option value selected="selected">Todos</option>
    								@foreach ($indexadores as $indexador)
    									<option {{ ($filtro == $indexador->id && $accion == 'revistasPorIndexaciones') ? 'selected' : '' }} value="{{ $indexador->id}}"> {{ $indexador->nombre }} </option>
    								@endforeach
    							</select>
    							@inject('indiceServicio', 'App\Services\IndicesServicio')
    							<select name="entidad_id" id="entidad_id" style="display: none;">
    								{{-- <option value="all">Todos</option> --}}
    								<option value selected="selected">Todos</option>
    								@foreach ($entidades = $indiceServicio->getEntidadesEditoras() as $entidad)
    									<option {{ ($filtro == $entidad->id && $accion == 'revistasPorEntidad') ? 'selected' : '' }} value="{{ $entidad->id}}"> {{ $entidad->nombre }} </option>
    								@endforeach
    							</select>

    							<select name="subsistema_id" id="subsistema_id" style="display: none;">
    								{{-- <option value="all">Todos</option> --}}
    								<option value selected="selected">Todos</option>
    								@foreach ($subsistemas = $indiceServicio->getSubsistemas() as $subsistema)
    									<option {{ ($filtro == $subsistema->id && $accion == 'revistasPorSubsistema') ? 'selected' : '' }} value="{{ $subsistema->id}}"> {{ $subsistema->nombre }} </option>
    								@endforeach
    							</select>

    							<select name="oldRevistas" id="oldRevistas" style="display: none;">
    									<option {{ ($filtro == "Descontinuada" && $accion == 'oldRevistas') ? 'selected' : '' }} value="{{ $filtro}}">
    										{{$filtro}}
    									</option>
    							</select>
    						</div>
    						<div class="row">
    							<div class="col-md-2 text-right">
	        						<label> Números de registros a mostrar:</label>
	        					</div>
	        					<div class="col-md-1" style="padding:0px;">
	        						<br>
	        						<select
	        							name="per_page"
	        							id="per_page"
	        							class="custom-select"
	        							onchange="data_ajax('{{ route('revistas.listado') }}', '#form_revista', '#revistas_resultado')">
	        							<option value="10">10</option>
	        							<option value="20" selected="selected">20</option>
	        							<option value="50">50</option>
	        							<option value="100">100</option>
	        						</select>
	        					</div>
	        					<div class="col-md-1 text-right">
	        						<label>Arbitrada:</label>
	        					</div>
	        					<div class="col-md-1" style="padding:0px;">
	        						<select name="arbitrada" id="arbitrada" class="custom-select" onchange="data_ajax('{{ route('revistas.listado') }}', '#form_revista', '#revistas_resultado')">
	        							<option value selected="selected">Todos</option>
	        							<option value="Si">Si</option>
	        							<option value="No">No</option>
	        						</select>
	        					</div>
	        					<div class="col-md-1">
	        						<label>Soportes:</label>
	        					</div>
	        					<div class="col-md-1" style="padding:0px;">
	        						<select class="custom-select" name="soporte" id="soporte" onchange="data_ajax('{{ route('revistas.listado') }}', '#form_revista', '#revistas_resultado')">
										<option value selected="selected">Todos</option>
										<option value="Digital">Digital</option>
										<option value="Impreso">Impreso</option>
										<option value="Ambas">Digital e Impreso</option>
									</select>
	        					</div>

	        					<!-- Botón para lanzar la ventanda modal que contiene la gráfica -->
								<div class="col-md-1 text-right">
									<a href="#myModalChart" data-toggle="modal"><img src="http://www.revistas.unam.mx/catalogo/assets/img/icono_estadisticas.png" id="img_chart" style="margin-left: 15px; margin-top: -5px;" />
									</a>
								</div>

								<!-- Select Box para elegir mediante que indice se quiere realizar la gráfica -->

								<div class="col-md-2 text-right">
									<select name="grafica" id="grafica" class="form-control  form-control input-sm" style="width:100;">
									<option value="" selected="selected">Seleccione...</option>
									<option value="1">Áreas del conocimiento</option>
									<option value="2">Entidades académicas</option>
									<option value="7">Indexaciones</option>
									<option value="3">Subsistemas</option>
									<option value="6">Tipos de revista</option>
									</select>
								</div>
    						</div>
        				</form>
    				</div>
    			</div>
    			@include("resultados.index")
        </div> {{-- Termina el div.col-md-9--}}
    </div> {{-- Terminal el div.row--}}
</div> {{-- Terminal el div.container-fluid--}}

<script>
	// Función para obtener las revistas mediante los filtros
	//
	function data_ajax(path, form_recurso, elemento_resultado){
		$.ajax({
			url: path,
			data: $(form_recurso).serialize(),
			method: 'GET'
		})
		.done(function(response) {
			console.log(response);
			$(elemento_resultado).html(response);
		})
		.fail(function( jqXHR, textStatus ) {
			$(elemento_resultado).html("Ocurrión un error, intentalo más tarde");
		});
	}

	// Agregando la funcionalidad para que funcione la ventana modal de la ficha
    $(document).ready(function(){
        $("#fichaRevistaModal").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('id');
            console.log("data-id: ", id);
            $.get( "/verFicha/" + id, function( data ) {
            	console.log(data);
                $(".modal-body").html(data);
            });

        });

        // $('.custom-select').change(function(e) {
        // 	e.preventDefault();
        // 	var selected_per_page = $(this).children("option:selected").val();
        // 	let _token   = $('meta[name="csrf-token"]').attr('content');
        // 	// console.log("selected per_page: ", selected_per_page);

        // 	$.ajax({
	       //  	url:"/listado",
	       //  	type: "POST",
	       //  	data: {
	       //  		per_page: selected_per_page,
	       //  		arbitrada: arbitrada
	       //  		_token: _token
	       //  	},
	       //  	success: function(response){
	       //  		console.log(response);
	       //  	}
	       //  });
        // });
    });
</script>
@endsection