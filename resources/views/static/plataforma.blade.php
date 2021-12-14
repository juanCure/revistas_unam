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
                        <h2 id="heading_static_page">Plataformas de Gestión Editorial (revistas, libros y repositorios)</h2>
                        <p>Actualmente, el uso de plataformas de gestión editorial es una buena práctica que permite optimizar en línea, los procesos de gestión editorial y publicación digital de revistas, libros y acervos documentales, y adicionalmente, logrando una mayor visibilidad y alcance de los contenidos publicados.<br></p>
                        <p>Por tal motivo, el personal de la Subdirección de Revistas Académicas y Publicaciones Digitales de la DGPyFE, con el objetivo de apoyar el fortalecimiento de los equipos editoriales tanto de la Universidad como de otras instituciones, ofrece asistencia técnica sobre:<br></p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Asistencia Técnica</th>
                                        <th>Plataformas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <ul>
                                                <li>Instalación<br></li>
                                                <li>Configuración</li>
                                                <li>Puesta en marcha<br></li>
                                                <li>Operación</li>
                                                <li>Mantenimiento</li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul>
                                                <li>Open Journal Systems (OJS)<br></li>
                                                <li>Open Monograph Press (OMP)<br></li>
                                                <li>Dspace</li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <p>Estos servicios pueden ser solicitados tanto por las dependencias universitarias como por instituciones externas a la UNAM.<br></p>
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