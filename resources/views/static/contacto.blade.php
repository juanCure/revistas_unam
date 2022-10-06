@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inicio')}}"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Información de contacto<br></span></a></li>
                </ol>
                <div class="row no-gutters page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Información de Contacto</h2>
                    </div>
                    <div class="col-12 col-lg-6 d-flex align-items-center article_col">
                        <div>
                            <h5 id="heading_static_page-1" style="color: #a4a4a4;">Universidad Nacional Autónoma de México<br></h5>
                            <h4 id="heading_static_page-2">Dirección General de Publicaciones y Fomento Editorial</h4>
                            <ul style="list-style: none;">
                                <li class="d-xl-flex align-items-xl-center"><i class="fa fa-home"></i><span>Av. del IMAN No. 5 Ciudad Universitaria, CP. 04510 México, D.F.</span></li>
                                <li class="d-xl-flex align-items-xl-start"><i class="fa fa-phone"></i><span>(55) 5622-6189<br>(01-800) 50-10-400</span></li>
                                <li class="d-xl-flex align-items-xl-center"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20" fill="none">

                                        <path d="M2.00333 5.88355L9.99995 9.88186L17.9967 5.8835C17.9363 4.83315 17.0655 4 16 4H4C2.93452 4 2.06363 4.83318 2.00333 5.88355Z" fill="currentColor"></path>
                                        <path d="M18 8.1179L9.99995 12.1179L2 8.11796V14C2 15.1046 2.89543 16 4 16H16C17.1046 16 18 15.1046 18 14V8.1179Z" fill="currentColor"></path>
                                    </svg><a href="mailto:revistas@unam.mx" target="_blank">revistas@unam.mx</a></li>
                                <li class="d-xl-flex align-items-xl-center"><i class="fa fa-clock-o"></i><span>Horario de atención: lunes - viernes: 9 a 19 horas</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                        <div><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4848.964400941306!2d-99.18482278457181!3d19.307380149674593!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce00717db78f37%3A0xea901786b668e0aa!2sAv+Del+Im%C3%A1n+5%2C+Cd.+Universitaria%2C+04530+Ciudad+de+M%C3%A9xico%2C+D.F.!5e1!3m2!1ses-419!2smx!4v1444558833321" width="400" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe></div>
                    </div>
                </div>
            </div>	
        </div>
    </div>
@endsection