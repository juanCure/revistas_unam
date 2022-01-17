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
                        <h2 id="heading_static_page">Subsistemas</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" style="margin-bottom: 10px;padding-bottom: 10px;border-bottom: solid 1px var(--link);">
                        <div class="table-responsive text-sm-center" id="links_table">
                            <table class="table table-striped table-hover" id="results-table">
                                <tbody>
									@foreach ($subsistemas as $subsistema)
										<tr>
	                                        <td class="text-left"><a href="{{ route('revistas.subsistema', ['subsistema_id' => $subsistema->id]) }}">{{ $subsistema->nombre }}</a></td>
	                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection