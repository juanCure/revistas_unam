@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Créditos<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Créditos del portal web</h2>
                        <section>
                            <h3>Dirección General de Publicaciones y Fomento Editorial<br></h3>
                            <ul>
                                <li><span class="creditos_nombre creditos">Mtra. Socorro Venegas Pérez<br></span><span class="creditos_cargo creditos">Directora General de Publicaciones y Fomento Editorial<br><br></span></li>
                                <li><span class="creditos_nombre creditos">Act. Guillermo Chávez Sánchez<br></span><span class="creditos_cargo creditos">Subdirector de Revistas Académicas y Publicaciones Digitales<br><br></span></li>
                                <li><span class="creditos_nombre creditos">Juan Manuel Rodríguez Martínez<br></span><span class="creditos_nombre creditos">Ing. Jorge Pérez García<br></span><span class="creditos_cargo creditos">Desarrollo, infraestructura y soporte técnico<br><br></span></li>
                                <li><span class="creditos_nombre creditos">Nataly Vaca Tapia<br></span><span class="creditos_nombre creditos">Jaquelin Segura Bautista<br></span><span class="creditos_nombre creditos">Liseth Coello González<br></span><span class="creditos_cargo creditos">Soporte técnico de OJS<br><br></span></li>
                                <li><span class="creditos_nombre creditos">Víctor Daniel Haro Gómez<br></span><span class="creditos_nombre creditos">Dolores Montiel García<br></span><span class="creditos_cargo creditos">Diseño y desarrollo Web<br><br></span></li>
                                <li><span class="creditos_nombre creditos">Lic. Gloria Cienfuegos Suárez<br></span><span class="creditos_nombre creditos">Lic. Carina Itzel Gálvez García<br></span><span class="creditos_nombre creditos">LI. Miguel Ángel González Guagnelli<br></span><span class="creditos_nombre creditos">LI. Jesús Zoe Díaz Peláez<br></span><span class="creditos_nombre creditos">LDG. Leylani García Bañuelos<br></span><span class="creditos_cargo creditos">Anteriores colaboradores<br><br></span></li>
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection