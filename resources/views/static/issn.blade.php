@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>ISBN, ISSN Y DOI<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">ISBN, ISSN Y DOI</h2>
                        <p>La Subdirección de Revistas Académicas y Publicaciones Digitales de la DGPyFE ofrece orientación, tanto a las entidades editoras de la UNAM como a instituciones externas, para la gestión trámites legales relacionados con la protección de derechos de autor, tanto para publicaciones impresas como digitales:<br></p>
                        <ul>
                            <li>ISBN (International Standard Book Number).<br></li>
                            <li>ISSN (International Standard Serial Number).<br></li>
                            <li>Reserva de Derechos al Uso Exclusivo de Título.<br></li>
                            <li>Búsqueda de antecedentes registrales y dictámenes previos.<br></li>
                            <li>DOI (Digital Object Identifier).<br></li>
                        </ul>
                        <h4>Costos<br></h4>
                        <p><strong>Dependencias universitarias:</strong><br></p>
                        <ul>
                            <li>No aplica</li>
                        </ul>
                        <p><strong>Otras instituciones:</strong><br></p>
                        <ul>
                            <li>Se requiere valoración.<br></li>
                        </ul>
                        <ul></ul>
                        <h4>Informes<br></h4>
                        <p><a href="mailto:revistas@unam.mx">revistas@unam.mx&nbsp;</a><br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection