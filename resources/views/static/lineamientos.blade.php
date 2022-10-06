@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inicio')}}"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Lineamientos<br></span></a></li>
                </ol>
                <div>Aquí deberán venir los lineamientos!</div>
            </div>	
        </div>
    </div>
@endsection