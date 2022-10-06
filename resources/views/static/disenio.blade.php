@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inicio')}}"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Digitalización y Diseño Web<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Digitalización y Diseño Web</h2>
                        <p>Con el objetivo de apoyar a los equipos editoriales en el mantenimiento y actualización de las páginas y sitios web de las publicaciones digitales universitarias, la Subdirección de Revistas Académicas y Publicaciones Digitales de la DGPyFE, ofrece asistencia técnica en las siguientes actividades:<br></p>
                        <ul>
                            <li>Diseño de identidad gráfica institucional.<br></li>
                            <li>Edición de imágenes y videos<br></li>
                            <li>Desarrollo y aplicación de hojas de estilo.<br></li>
                            <li>Digitalización de documentos<br></li>
                            <li>Recuperación Óptica de Caracteres<br></li>
                            <li>Edición de documentos PDF, HTML, XML, EPUB y FLIPBOOK<br></li>
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
                        <p><a href="mailto:revistas@unam.mx">revistas@unam.mx</a>&nbsp;<br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection