@extends('layouts.app')
@section('content')
<div class="container-fluid" id="main_container">
    <div class="row" id="results_cards">
        	@include('public_sidebar')
        	{{-- Incluyendo la vista modal de la ficha --}}
        	@include('resultados.ficha')
        	@include('resultados.indicadores_modal')
        	{{-- Incluyendo la ventana modal de la gráfica --}}
        	@include('resultados.modal_chart')
        	<!-- Central column -->
        	<div class="col-lg-9 order-1 order-lg-2 data_col" style="background: #ffffff;border-top-right-radius: 10px;">
	            <div class="row">
	                <div class="col-12" id="data_filters">
	                    <ol class="breadcrumb">
	                        <li class="breadcrumb-item"><a href="{{ route('inicio') }}"><span>Inicio > </span></a></li>
	                        <li class="breadcrumb-item"><a href="#"><span>{{ $breadcrumb }}</span></a></li>
	                        <li class="breadcrumb-item"><a href="#"><span>Resultados</span></a></li>
	                    </ol>
	                    <form id="form_revista" method="POST" action=" {{ route('revistas.export')}}">
	                    	@csrf
							<div class="form-row row-cols-5">
								<div class="col-12 d-sm-flex d-xl-flex justify-content-sm-center align-items-sm-center justify-content-xl-center align-items-xl-center" id="alphabet_col" style="/*padding: 0;*//*height: 80px;*/">
									<div class="d-xl-flex align-items-xl-center" id="alphabet_section">
										<div id="alphabet_container" style="/*min-height: 80px;*/padding-bottom: 5px;padding-top: 5px;/*margin-bottom: 10px;*//*display: none;*/">
						    				@foreach ($alfabeto as $letra)
						    					<div class="alfabeto">
						    						<label class="letter">
							    						{{ $letra }}
							    						<input class="form-control abecedario" type="radio" name="abc" value="{{ $letra }}" onchange="data_ajax('{{ route('revistas.listado') }}', '#form_revista', '#revistas_resultado')">
							    					</label>
						    					</div>

								        	@endforeach
								        </div>
					    			</div>
								</div>

								{{-- Hidden Box Select for remaining the selected indexes --}}
								<div class="row" style="display:none">
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

								{{-- Filters on top of results --}}

								<div class="col-6 col-md-4 col-xl-2 d-flex d-xl-flex justify-content-center align-items-center justify-content-sm-start justify-content-md-center justify-content-xl-start filter_col" id="col_registros">
                                    <div class="d-flex d-xl-flex justify-content-center align-items-center justify-content-xl-center"><label class="d-flex d-xl-flex align-items-center align-items-xl-center">Registros</label>
                                    	{{-- <select class="border rounded-pill form-control" id="select_registro">
                                            <option value="10" selected="">10</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> --}}
                                        <select class="border rounded-pill form-control" id="select_registro"
		        							name="per_page"
		        							onchange="data_ajax('{{ route('revistas.listado') }}', '#form_revista', '#revistas_resultado')">
		        							<option value="10">10</option>
		        							<option value="20" selected="selected">20</option>
		        							<option value="50">50</option>
		        							<option value="100">100</option>
		        						</select>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4 col-xl-3 d-flex d-xl-flex justify-content-center align-items-center justify-content-sm-center justify-content-xl-center align-items-xl-center filter_col">
                                    <div class="text-center d-xl-flex justify-content-xl-center" style="width: 100%;"><label class="d-xl-flex align-items-xl-center">Arbitrada</label>
                                        <select class="border rounded-pill form-control" id="select_registro-3" name="arbitrada" onchange="data_ajax('{{ route('revistas.listado') }}', '#form_revista', '#revistas_resultado')">
		        							<option value selected="selected">Todos</option>
		        							<option value="Si">Si</option>
		        							<option value="No">No</option>
		        						</select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4 col-xl-3 d-flex d-xl-flex align-items-center justify-content-sm-center justify-content-xl-start filter_col">
                                    <div class="text-center d-xl-flex justify-content-xl-center" style="width: 100%;"><label class="d-xl-flex align-items-xl-center">Soportes</label>
                                        <select class="border rounded-pill form-control" id="select_registro-1" name="soporte" onchange="data_ajax('{{ route('revistas.listado') }}', '#form_revista', '#revistas_resultado')">
											<option value selected="selected">Todos</option>
											<option value="Digital">Digital</option>
											<option value="Impreso">Impreso</option>
											<option value="Ambas">Digital e Impreso</option>
										</select>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-8 col-xl-3 text-center filter_col">
                                    <div class="d-md-flex justify-content-xl-center"><a href="#myModalChart" data-toggle="modal"><label class="d-xl-flex align-items-xl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bar-chart-fill" style="/*transform: scale(1.5);*/color: var(--gray-dark);font-size: 2em;">
                                            <path d="M1 11a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3zm5-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V2z"></path>
                                        </svg></label></a>

                                        <select name="grafica" class="border rounded-pill form-control" id="select_registro-2" style="width:100;">
											<option value="" selected="selected">Seleccione...</option>
											<option value="1">Áreas del conocimiento</option>
											<option value="2">Entidades académicas</option>
											<option value="7">Indexaciones</option>
											<option value="3">Subsistemas</option>
											<option value="6">Tipos de revista</option>
										</select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-xl-1 d-flex d-xl-flex justify-content-center justify-content-md-center align-items-md-center justify-content-lg-center justify-content-xl-center filter_col" id="col_download_btn">
                                	<button class="btn btn-danger btn-sm d-xl-flex justify-content-xl-center align-items-xl-center" id="download_btn" type="submit"  style="float: right;">
                                		<i class="fa fa-download" id="icono_descarga" style="/*margin-left: 10px;*/font-size: 1.4em;"></i>
                                	</button>
                                </div>
							</div> <!-- Ending for <div class="form-row .row-cols-5"> -->
	    				</form>
	                </div>
	                @if(count($revistas ?? '') == 0)
						<div class="alert alert-warning">
							No se encontraron resultados
						</div>
					@else
						<div id="revistas_resultado">
	                		@include("resultados.index")
	                	</div>
	                @endif
	            </div>
	        </div>

    </div> {{-- Terminal el div.row--}}
</div> {{-- Terminal el div.container-fluid--}}

{{-- Bibliotecas javascript y código para renderizar una gráfica Highcharts --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
	// Obteniendo la URL DE LA APP
	var APP_URL = {!! json_encode(url('/')) !!}
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
					url: APP_URL + "/grafica/",
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
        $("#modal_data").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('id');
            console.log("data-id: ", id);
            $.get( APP_URL + "/verFicha/" + id, function( data ) {
            	// console.log(data);
                $(".modal-body").html(data.body);
                // console.log(data.title);
                $("#data_title > a").html(data.title);
            });

        });

        // Agregando la funcionalidad para que funcione la ventana modal de los indicadores
        $("#indicadorModal").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('id');
            $.get( APP_URL + "/indicador/" + id, function( data ) {
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
@push('styles_for_journals')
<link rel="stylesheet" href="{{ asset('css/journal_view.css') }}">
@endpush