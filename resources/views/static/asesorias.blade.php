@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inicio') }}"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Asesorías y Consultorías<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Asesorías y Consultorías</h2>
                        <p>La DGPyFE, a través de la Subdirección de Revistas Académicas y Publicaciones Digitales (RAyPD), ofrece asesorías y consultorías para la planeación, desarrollo y operación de proyectos relacionados con la producción, edición, publicación, distribución y preservación publicaciones y acervos digitales.<br></p>
                        <p>Algunas líneas de asesoría y consultoría que se ofrecen son:<br></p>
                        <ul>
                            <li>Buenas prácticas editoriales<br></li>
                            <li>Producción y edición de eBooks<br></li>
                            <li>Publicación y distribución de eBooks<br></li>
                            <li>Formatos de publicación digital<br></li>
                            <li>Derechos de autor<br></li>
                            <li>Acceso Abierto<br></li>
                            <li>Uso de la plataforma de gestión editorial Open Journal Systems (OJS)<br></li>
                            <li>Uso de la plataforma de gestión editorial Open Monograph Press (OMP)<br></li>
                            <li>Uso de la plataforma de gestión de repositorios (Dspace)<br></li>
                        </ul>
                        <p>Estos servicios pueden ser solicitados tanto por las dependencias universitarias como por instituciones externas a la UNAM.<br></p>
                        <h4>Costos<br></h4>
                        <p><strong>Dependencias universitarias:</strong><br></p>
                        <ul>
                            <li>No aplica</li>
                        </ul>
                        <p><strong>Otras instituciones:</strong><br></p>
                        <ul>
                            <li>Costo por hora: $500.00<br></li>
                        </ul>
                        <h5>Informes<br></h5>
                        <p>Lic. Nataly Vaca Tapia (<a href="mailto:nvaca@libros.unam.mx" target="_blank">nvaca@libros.unam.mx</a>)<br></p>
                        <p>Procesos Editoriales de la Subdirección de Revistas Académicas y Publicaciones Digitales. DGPyFE-UNAM<br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    	</div>
    </div>
@endsection