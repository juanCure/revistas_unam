@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inicio')}}"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Asesorías y Consultorías<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Digitalización y Diseño Web</h2>
                        <p>En la Subdirección de Revistas Académicas y Publicaciones Digitales de la DGPyFE, con el objetivo de apoyar a los equipos editoriales en el mantenimiento y actualización las web en donde se publican y difunden las ediciones digitales, ofrece asistencia técnica en las siguientes actividades:<br></p>
                        <ul>
                            <li>Diseño de identidad gráfica institucional.<br></li>
                            <li>Edición de imágenes y videos<br></li>
                            <li>Desarrollo y aplicación de hojas de estilo.<br></li>
                            <li>Digitalización de documentos<br></li>
                            <li>Recuperación Óptica de Caracteres<br></li>
                            <li>Edición de documentos PDF<br></li>
                        </ul>
                        <h4>Costos<br></h4>
                        <p><strong>Dependencias universitarias:</strong><br></p>
                        <ul>
                            <li>Se requiere valoración.<br></li>
                        </ul>
                        <p><strong>Otras instituciones:</strong><br></p>
                        <ul>
                            <li>Se requiere valoración.<br></li>
                        </ul>
                        <h5>Informes<br></h5>
                        <p>Lic. Carina Itzel Gálvez García (<a href="mailto:cgalvez@libros.unam.mx" target="_blank">cgalvez@libros.unam.mx</a>)<br></p>
                        <p>Procesos Editoriales de la Subdirección de Revistas Académicas y Publicaciones Digitales. DGPyFE-UNAM.<br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection