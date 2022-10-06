@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inicio') }}"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Información general<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Información general</h2>
                        <p>El portal de Revistas UNAM (<a href="www.revistas.unam.mx" target="_blank">www.revistas.unam.mx</a>) alberga todas las revistas que son editadas o coeditadas por las diferentes entidades de la Universidad Nacional Autónoma de México (UNAM). La selección de revistas y los criterios de clasificación se retoman del sistema de información Latindex.<br></p>
                        <p>El portal es desarrollado por la Dirección General de Publicaciones y Fomento Editorial (DGPyFE) de la UNAM, tiene como objetivos facilitar la búsqueda y consulta de las revistas académicas; incrementar su visibilidad, presencia e impacto; sentar bases metodológicas; compartir información acerca de las buenas prácticas editoriales y los lineamientos institucionales; fomentar una mejora continua de las publicaciones universitarias y lograr un mayor posicionamiento a nivel internacional. </p>
                        <p>Adicionalmente, el nuevo portal ofrece un motor de búsqueda detallado para la recuperación de artículos de las revistas publicadas en la plataforma de gestión editorial Open Journal Systems (OJS) o en cualquier otro sistema informático que integre la tecnología necesaria para el intercambio de los datos descriptivos de los artículos como son: título, resumen, palabras clave, nombre de autores, entre otros. </p>
                        <h4>Antecedentes</h4>
                        <p>El portal Revistas UNAM es el resultado del esfuerzo colectivo de distintas áreas y equipos editoriales universitarios, quienes a lo largo de poco más de dos décadas, han desarrollado diversas actividades dando lugar a este nuevo sistema de información universitaria.</p>
                        <p>Uno de los primeros esfuerzos institucionales encaminados a dar una mayor visibilidad a las revistas universitarias en formato digital fue el portal denominado e-Journal. Este sistema fue desarrollado en 1999 como parte de la Biblioteca Digital de la Dirección General de Servicios de Cómputo Académico de la UNAM. Desde su creación y hasta 2009, fecha en la que cesó su operación y mantenimiento, se lograron incorporar 25 títulos de revistas universitarias.</p>
                        <p>A finales de 2009, por iniciativa de la Secretaría General, se desarrolló el portal de Revistas Científicas y Arbitradas de la UNAM con el objetivo de impulsar la transición de la publicación impresa a la publicación digital. Este portal, igualmente desarrollado por la Dirección General de Servicios de Cómputo Académico de la UNAM, inició con los 25 títulos que conformaban originalmente e-Journal y para abril de 2015 logró albergar más de 100 títulos universitarios.</p>
                        <p>En abril de 2015, el Consejo de Publicaciones Académicas y Arbitradas de la UNAM (órgano colegiado creado por decreto del entonces rector en octubre de 2013) en su cuarta sesión ordinaria, encomendó a la Dirección General de Publicaciones y Fomento Editorial dar continuidad a este proyecto. </p>
                        <p>En mayo de 2015, la DGPyFE asumió la administración del portal y comenzó el desarrollo de una nueva versión en la que se incluirían todas las revistas universitarias de corte académico. Así, el 15 de marzo de 2016 se liberó el renovado portal de Revistas UNAM, con más de 145 títulos de revistas disponibles para su consulta libre y gratuita a través de la dirección electrónica www.revistas.unam.mx.</p>
                        <p>Después de seis años de operación, con el objetivo de ofrecer un sistema que integrara nuevas tecnologías y funcionalidades, a partir de octubre de 2022, la DGPFE ha puesto en operación una nueva versión del portal de Revistas UNAM, el cual permite una mejor gestión, recuperación y consulta de las revistas académicas que edita y publica la UNAM.</p>
                        <h4>Agradecimientos</h4>
                        <p>La Dirección General de Publicaciones y Fomento Editorial, nuevamente se congratula al ofrecer a toda la comunidad académica y al público en general esta nueva versión del portal de Revistas UNAM, con información de los más de 150 títulos que actualmente conforman el Catálogo de Revistas UNAM 2022, con la posibilidad de consultar cerca de 50,000 artículos a texto completo. Un agradecimiento y reconocimiento especial a los responsables de las revistas por su participación en la integración de las fichas catalográficas, así como también al sistema Latindex, que ha sido la fuente de referencia.</p>
                    </div>
                </div>
            </div>
    	</div>
    </div>
@endsection