@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<h1>Resultados</h1>
    <div class="row">
        {{-- <div class="col-md-12"> --}}
        	@include('public_sidebar')
        	{{-- Incluyendo la vista modal de la ficha --}}
        	@include('resultados.ficha')
        	@include('resultados.indicadores_modal')
        	{{-- Incluyendo la ventana modal de la gráfica --}}
        	@include('resultados.modal_chart')
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
    									<option {{ ($filtro == "Descontinuada" && $accion == 'oldRevistas') ? 'selected' : '' }} value="{{ $filtro == "Descontinuada" ? $filtro : ''}}">
    										{{ $filtro == "Descontinuada" ? $filtro : ''}}
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

{{-- Bibliotecas javascript y código para renderizar una gráfica Highcharts --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
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
			// console.log(response);
			$(elemento_resultado).html(response);
		})
		.fail(function( jqXHR, textStatus ) {
			$(elemento_resultado).html("Ocurrión un error, intentalo más tarde");
		});
	}
	/* Función para obtener los datos para la gŕafica que se carga en una ventana modal */
	function load_modal_chart(){

		var modal = $('#myModalChart');
		var r = $("#grafica").val();
		if (r != "") {
			$.ajax({
					url: "/grafica/",
					// data: $("#form_revista").serialize() + '&r=' + r,
					//url: '/grafica/' + $('select[name=grafica] option').filter(':selected').val(),
					data: $('#form_revista').serialize(),
					method: 'GET',
					dataType: 'json',
					// beforeSend: function(xhr) {
					// 	modal.find('.modal-body').html(create_loader());
					// }
				})
				.done(function(response) {
					if (response.data.length === 0) {
						console.log("El campo data es vacío");
						modal.find('#modal-body').html("No se encontraron registros!");
						modal.find("#modal-body").css("min-height", '50px');
					} else {
						var tipoChart = (r == '2') ? 'bar' : 'column';
						if (r == '2') {
							modal.find("#modal-body").css("min-height", '1500px');
						} else {
							modal.find("#modal-body").css("min-height", '550px');
						}
						Highcharts.chart('modal-body', {
							chart: {
								type: tipoChart
							},
							title: {
								text: response.titulo
							},
							xAxis: {
								type: 'category',
							},
							yAxis: {
								title: {
									text: 'Número de revistas'
								}

							},
							legend: {
								enabled: false
							},
							plotOptions: {
								series: {
									borderWidth: 0,
									dataLabels: {
										enabled: true,
										//format: '{point.y:.1f}%'
										format: '{point.y}'
									}
								},
								column: {
									groupPadding: null,
									borderWidth: null,
									dataLabels: {
										enabled: null,
										color: null,
										style: {
											fontSize: null,
											"font-weight": "bold"
										},
										"formatter": function() {
											return this.series.name + this.y + "";
										}
									}
								}
							},
							credits: {
								enabled: false
							},
							tooltip: {
								headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
								pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
								//pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> del total<br/>'
							},
							series: [{
								name: response.indice,
								colorByPoint: true,
								data: response.data
							}]
						});
					}
				})
				.fail(function(jqXHR, textStatus) {
					modal.find('#modal-body').html("Ocurrió un error durante el proceso, inténtelo más tarde.");
				});
		} else {
			modal.find('#modal-body').html("<br><br><br><br><h4 class='text-center'>Debe seleccionar el tipo de gráfica a mostrar.</h4>");
		}
	}

    $(document).ready(function(){

    	// Agregando la funcionalidad para que funcione la ventana modal de la ficha
        $("#fichaRevistaModal").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('id');
            // console.log("data-id: ", id);
            $.get( "/verFicha/" + id, function( data ) {
            	// console.log(data);
                $(".modal-body").html(data);
            });

        });

        // Agregando la funcionalidad para que funcione la ventana modal de los indicadores
        $("#indicadorModal").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('id');
            $.get( "/indicador/" + id, function( data ) {
            	if(data.indicador != null) {
            		$(".modal-body").html(data.indicador);
            	} else {
            		$(".modal-body").html("<p>La revista seleccionada no tiene indicadores que mostrar!</p>");
            	}

            });

        });


        // Agregando la funcionalidad para disparar la ventana modal que contiene la gráfica con totales según los criterios seleccionados
        $("#myModalChart").on("show.bs.modal", function(e) {
            var selected_data = $('#form_revista').serialize();
            console.log("Se ha disparado la ventana modal ", selected_data);
            load_modal_chart();
        });
    });
</script>
@endsection