@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inicio') }}"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>INformación general<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Información general</h2>
                        <p>En el Portal se incluyen todas las revistas que son editadas o coeditadas por las diferentes entidades de nuestra Universidad. La selección de revistas y los criterios de clasificación se retoman del sistema de información Latindex.<br></p>
                        <p>Este Portal, desarrollado por la Dirección General de Publicaciones y Fomento Editorial (DGPyFE) de la UNAM, tiene como objetivos facilitar la búsqueda y consulta de las revistas académicas; incrementar su visibilidad, presencia e impacto; sentar bases metodológicas; compartir información acerca de las buenas prácticas editoriales y los lineamientos institucionales; fomentar&nbsp;una mejora continua de las publicaciones universitarias y lograr un mayor posicionamiento a nivel internacional. </p>
                        <p>Adicionalmente, en este nuevo portal se ofrece un motor de búsqueda para la recuperación de los artículos de las revistas que son publicados con el uso de la plataforma de gestión editorial Open Journal Systems o cualquier otro sistema informático que integre la tecnología necesaria para el intercambio de los datos descriptivos de los artículos como son: título, resumen, palabras clave, nombre de autores, entre otros. </p>
                        <h4>Antecedentes</h4>
                        <p>El portal Revista UNAM es el resultado del esfuerzo colectivo de distintas áreas y equipos editoriales universitarios, quienes a lo largo de poco más de dos décadas, han desarrollado diversas actividades dando lugar a este nuevo sistema de información universitaria.</p>
                        <p>Uno de los primeros esfuerzos institucionales encaminados a dar una mayor visibilidad a las revistas universitarias en formato digital fue el portal denominado e-Journal. Este sistema fue desarrollado en el año de 1999 como parte de la Biblioteca Digital de la Dirección General de Servicios de Cómputo Académico de la UNAM. Desde su creación hasta el 2009, fecha en la que fue cesada su operación y mantenimiento, se lograron incorporar 25 títulos de revistas universitarias.</p>
                        <p>A finales de 2009, por iniciativa de la Secretaría General, se desarrolló el Portal de Revistas Científicas y Arbitradas de la UNAM con el objetivo de impulsar la transición de la publicación impresa a la publicación digital. Este portal, igualmente desarrollado por la Dirección General de Servicios de Cómputo Académico de la UNAM, inició con los 25 títulos que conformaban el original e-Journal y para abril de 2015 logró albergar a más de 100 títulos universitarios.</p>
                        <p>En el mes de abril de 2015, el Consejo de Publicaciones Académicas y Arbitradas de la UNAM –órgano colegiado creado por decreto del Rector en octubre de 2013– en su 4ª sesión ordinaria, encomienda a la Dirección General de Publicaciones y Fomento Editorial dar continuidad a esta iniciativa. Es así como a partir de mayo de 2015, la DGPyFE asume la administración del citado portal y comienza el desarrollo de una nueva edición en la que se incluyan todas las revistas universitarias de corte académico.</p>
                        <p>A esta nueva edición del portal se le ha denominado Revistas UNAM, el cual, a partir del 15 de marzo de 2016 queda disponible para su consulta libre y gratuita a través de la dirección electrónica www.revistas.unam.mx.</p>
                        <h4>Agradecimientos</h4>
                        <p>De esta manera, la Dirección General de Publicaciones y Fomento Editorial, se congratula al ofrecer a toda la comunidad académica y público en general este nuevo portal con información de los 144 títulos que conforman el Catálogo de Revistas UNAM 2020. De igual manera, agradece la colaboración de los responsables de las revistas por su participación para integrar las fichas, así como también al sistema Latindex como fuente de referencia.</p>
                    </div>
                </div>
            </div>
    	</div>
    </div>
@endsection