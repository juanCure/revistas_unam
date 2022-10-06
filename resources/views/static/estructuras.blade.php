@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Estructuras organizacionales<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">ESTRUCTURA ORNANIZACIONAL DE REVISTAS UNAM</h2>
                    </div>
                    <div class="col-12 d-flex justify-content-center align-items-center article_col"><img class="img-fluid" src="{{ asset('img/organigrama.png')}}" style="color: var(--link);"></div>
                </div>
            </div>
        </div>
    </div>
    	</div>
    </div>
@endsection