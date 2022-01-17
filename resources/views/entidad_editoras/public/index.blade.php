@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
		<div class="row" id="results_cards">
			@include('public_sidebar')
			<div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
				<ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inicio') }}"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>{{ $breadcrumb }}</span></a></li>
                </ol>
                <div class="row no-gutters row-cols-5">
                    <div class="col-12">
                        <h2 id="heading_static_page">Entidades Académicas</h2>
                    </div>
                </div>

                <div class="row" id="results_report_col">
			        <div class="col d-flex d-xl-flex justify-content-center justify-content-sm-start justify-content-md-start align-items-xl-center"><span class="d-sm-flex align-items-sm-end align-items-md-end" id="results_counter">
			        	Mostrando {{ $entidades->firstItem() }} a {{ $entidades->lastItem() }} de {{$entidades->total() }}</div>
			        <div class="col d-md-flex d-lg-flex justify-content-md-end justify-content-lg-end">
			            {{-- Carga los enlaces de paginación --}}
						{{ $entidades->links() }}
			        </div>
			    </div>

				<div class="row">
                    <div class="col-12" style="margin-bottom: 10px;padding-bottom: 10px;border-bottom: solid 1px var(--link);">
                        <div class="table-responsive text-sm-center" id="links_table">
                            <table class="table table-striped table-hover" id="results-table">
                                <tbody>
                                	@foreach ($entidades as $entidad)
                                		<tr>
	                                        <td class="text-left"><a href="{{ route('revistas.entidad', ['entidad_id' => $entidad->id]) }}">{{ $entidad->nombre }}</a></td>
	                                    </tr>
									@endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-12 d-flex justify-content-center align-items-center justify-content-sm-end">
				    <div class="row d-flex align-items-center">
				        <div class="col d-flex d-xl-flex align-items-center justify-content-xl-end align-items-xl-center">
				            {{-- Carga los enlaces de paginación --}}
							{{ $entidades->links() }}
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
@endsection