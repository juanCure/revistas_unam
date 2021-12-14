@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inicio') }}"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Material de Apoyo<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Material de Apoyo</h2>
                        <h4>Descripción del sistema</h4>
                        <ul>
                            <li><a href="pdf/01_Introduccion.pdf" target="_blank">Introducción (PDF)</a></li>
                            <li><a href="pdf/02_generalidades_ojs.pdf" target="_blank">Generalidades del sistema (PDF)</a></li>
                            <li><a href="pdf/03_elementos_interfaz.pdf:8000/#" target="_blank">Elementos de la interfaz (PDF)</a></li>
                        </ul>
                        <h4>Usuarios</h4>
                        <ul>
                            <li><a href="pdf/04_creacion_usuarios.pdf" target="_blank">Creación de usuarios (PDF)&nbsp;</a></li>
                            <li><a href="pdf/05_roles_usuarios.pdf" target="_blank">Roles de usuarios (PDF)</a></li>
                            <li><a href="pdf/06_area_personal.pdf" target="_blank">Área personal (PDF)&nbsp;</a></li>
                            <li><a href="pdf/07_paginas_gestion.pdf" target="_blank">Páginas de gestión (PDF)</a></li>
                        </ul>
                        <h4><a href="pdf/08_configuracion_general.pdf" target="_blank">Configuración de la Revista (PDF)</a></h4>
                        <ul>
                            <li><a href="pdf/09_paso1_detalles.pdf" target="_blank">Paso 1: Detalles (PDF)&nbsp;</a></li>
                            <li><a href="pdf/10_paso2_politicas.pdf" target="_blank">Paso 2: Políticas (PDF)</a></li>
                            <li><a href="pdf/11_paso3_envios.pdf" target="_blank">Paso 3: Envíos (PDF)&nbsp;</a></li>
                            <li><a href="pdf/12_paso4_gestion.pdf" target="_blank">Paso 4: Gestión (PDF)&nbsp;</a></li>
                            <li><a href="pdf/13_paso5_apariencia.pdf" target="_blank">Paso 5: Apariencia (PDF)&nbsp;</a></li>
                        </ul>
                        <h4>Publicación de un número<br></h4>
                        <ul>
                            <li><a href="pdf/22_Metadatos.pdf" target="_blank">Guía de metadatos para el Open Journal Systems (PDF)</a></li>
                            <li><a href="pdf/14_publicacion_numero.pdf" target="_blank">Envío de artículo (PDF)&nbsp;</a></li>
                            <li><a href="pdf/15_edicion_documento_activo.pdf" target="_blank">Proceso de edición de un documento activo (PDF)&nbsp;</a></li>
                            <li><a href="pdf/16_revision.pdf" target="_blank">Revisión (PDF)&nbsp;</a></li>
                            <li><a href="pdf/17_correccion.pdf" target="_blank">Corrección (PDF)&nbsp;</a></li>
                            <li><a href="pdf/16_revision.pdf" target="_blank">Revisión (PDF)&nbsp;</a></li>
                            <li><a href="pdf/18_diagramacion.pdf" target="_blank">Diagramación o maquetación (PDF)&nbsp;</a></li>
                            <li><a href="pdf/19_correccion_pruebas.pdf" target="_blank">Corrección de Pruebas (PDF)</a></li>
                            <li><a href="pdf/20_publicacion_consultas.pdf" target="_blank">Publicación y consultas (PDF)&nbsp;</a></li>
                            <li><a href="pdf/21_Resumen_publicacion.pdf" target="_blank">Resumen del proceso de publicación (PDF)</a></li>
                            <li><a href="pdf/todos_rolesAIDIS-OJS.pdf" target="_blank">Proceso completo de publicación-AIDIS (PDF)&nbsp;</a></li>
                        </ul>
                        <p>Open Journal Systems: Una guía completa para la edición de publicaciones en línea<br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection