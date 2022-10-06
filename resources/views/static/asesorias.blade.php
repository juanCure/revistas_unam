@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Asesorías y Consultorías<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Asesorías y Consultorías</h2>
                        <p>La DGPyFE, a través de la Subdirección de Revistas Académicas y Publicaciones Digitales (RAyPD), ofrece asesorías y consultorías para la planeación, desarrollo y operación de proyectos relacionados con la producción, edición, publicación, distribución y preservación de publicaciones y acervos digitales.<br></p>
                        <p>Algunas líneas de asesoría y consultoría que se ofrecen son:<br></p>
                        <ul>
                            <li>Buenas prácticas editoriales<br></li>
                            <li>Edición y publicación de revistas académicas<br></li>
                            <li>Producción, edición y distribución de eBooks<br></li>
                            <li>Formatos de publicación digital<br></li>
                            <li>Derechos de autor<br></li>
                            <li>Acceso Abierto (<em>Open Access OA</em>)<br></li>
                            <li>Uso de iThenticate<br></li>
                            <li>Identificadores: ISBN, ISSN, DOI y ORCID<br></li>
                            <li>Uso de la plataforma de gestión editorial Open Journal Systems (OJS)<br></li>
                            <li>Uso de la plataforma de gestión editorial Open Monograph Press (OMP)<br></li>
                            <li>Uso de la plataforma de gestión de repositorios (Dspace)<br></li>
                        </ul>
                        <p>Estos servicios pueden ser solicitados tanto por las dependencias universitarias como por instancias externas a la UNAM.<br></p>
                        <h4>Costos<br></h4>
                        <p><strong>Dependencias universitarias:</strong><br></p>
                        <ul>
                            <li>No aplica</li>
                        </ul>
                        <p><strong>Otras instituciones:</strong><br></p>
                        <ul>
                            <li>Costo por hora: $1000.00<br></li>
                        </ul>
                        <h5>Informes<br></h5>
                        <p><a href="mailto:revistas@unam.mx">revistas@unam.mx</a> y <a href="mailto:gestionderecursos@libros.unam.mx">gestionderecursos@libros.unam.mx</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    	</div>
    </div>
@endsection