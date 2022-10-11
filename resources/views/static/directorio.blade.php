@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Directorio<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Directorio UNAM</h2>
                        <section>
                            <h3>Universidad Nacional Autónoma de México</h3>
                            <ul>
                                <li><span class="creditos_nombre creditos">Dr. Enrique Luis Graue Wiechers<br></span><span class="creditos_cargo creditos">Rector</span></li>
                                <li><span class="creditos_nombre creditos">Dr. Leonardo Lomelí Vanegas<br></span><span class="creditos_cargo creditos">Secretario General</span></li>
                                <li><span class="creditos_nombre creditos">Dr. Luis Álvarez Icaza Longoria<br></span><span class="creditos_cargo creditos">Secretario Administrativo<br></span></li>
                                <li><span class="creditos_nombre creditos">Dra. Patricia Dolores Dávila Aranda<br></span><span class="creditos_cargo creditos">Secretaria de Desarrollo Institucional</span></li>
                                <li><span class="creditos_nombre creditos">Lic. Raúl Arcenio Aguilar Tamayo<br></span><span class="creditos_cargo creditos">Secretario de Prevención, Atención y Seguridad Universitaria</span></li>
                                <li><span class="creditos_nombre creditos">Dr. Alfredo Sánchez Castañeda<br></span><span class="creditos_cargo creditos">Abogado General</span></li>
                                <li><span class="creditos_nombre creditos">Dra. Rosa Beltrán Álvarez<br></span><span class="creditos_cargo creditos">Coordinadora de Difusión Cultural</span></li>
                            </ul>
                        </section>
                        <section>
                            <h3>Dirección General de Publicaciones y Fomento Editorial<br></h3>
                            <ul>
                                <li><span class="creditos_nombre creditos">Mtra. Socorro Venegas Pérez<br></span><span class="creditos_cargo creditos">Directora General de Publicaciones y Fomento Editorial<br></span></li>
                                <li><span class="creditos_nombre creditos">Act. Guillermo Chávez Sánchez<br></span><span class="creditos_cargo creditos">Subdirector de Revistas Académicas y Publicaciones Digitales<br></span></li>
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection