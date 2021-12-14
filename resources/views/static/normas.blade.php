@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Normas operativas<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Normas Operativas</h2>
                        <p>En el Portal se incluyen todas las revistas que son editadas o coeditadas por las diferentes entidades de nuestra Universidad. La selección de revistas y los criterios de clasificación se retoman del sistema de información Latindex.<br></p>
                        <ol>
                            <li>Difundir contenidos académicos.<br></li>
                            <li>Estar vigentes.<br></li>
                            <li>Tener al menos un número publicado.</li>
                            <li>Contar con registro ISSN correspondiente al soporte de publicación o bien, informar que dicho registro está en trámite.</li>
                            <li>El registro en el Catálogo da cuenta de la existencia de una revista, pero no certifica su calidad editorial; la cual se valida con la indexación de la revista en sistemas de información.</li>
                        </ol>
                        <p>En la actualidad el Portal alberga un total de 171 revistas que se clasifican bajo los siguientes criterios:<br></p>
                        <p><strong>Tipo de revista</strong>. Según su orientación se dividen en las siguientes categorías:<br></p>
                        <p><strong>Revistas de Investigación Científica</strong>. Aquellas que publican resultados de investigación y estudios originales. Son publicaciones arbitradas que cumplen con rigurosos estándares de calidad, lo cual las posiciona como revistas mexicanas de nivel internacional.<br></p>
                        <p><strong>Revistas Técnico-Profesionales</strong>. Difunden artículos y reseñas acerca del acontecer en un campo del conocimiento. Se incluyen investigaciones e información relevante sobre técnicas, herramientas y solución de problemas prácticos con el objetivo de contribuir al avance tecnológico y ampliar las fronteras del conocimiento.<br></p>
                        <p><strong>Revistas de Divulgación Científica</strong>. Ediciones cuyo objetivo es hacer accesible el conocimiento científico al público en general; difundir el resultado de investigaciones y los nuevos descubrimientos científicos. Generalmente son publicaciones multidisciplinares.<br></p>
                        <p><strong>Revistas Culturales</strong>. Órganos de comunicación de las entidades académicas cuyo objetivo es la difusión y el análisis de obras artísticas. Su contenido incluye artículos, reseñas, información sobre eventos, convocatorias y novedades, así como reportajes gráficos.<br></p>
                        <p><strong>Áreas del conocimiento</strong>. Basándose en los criterios del Consejo Nacional de Ciencia y Tecnología (CONACyT), las revistas se catalogan de acuerdo a las siguientes áreas del conocimiento:<br></p>
                        <ol>
                            <li>Biología y Química<br></li>
                            <li>Biotecnología y Ciencias agropecuarias<br></li>
                            <li>Ciencias sociales y Económicas<br></li>
                            <li>Físico matemáticas y Ciencias de la Tierra<br></li>
                            <li>Artes y Humanidades<br></li>
                            <li>Ingeniería e industria<br></li>
                            <li>Medicina y Ciencias de la conducta<br></li>
                            <li>Multidisciplinas<br></li>
                        </ol>
                        <p><strong>Arbitraje</strong>. Se detalla cuáles son las revistas que llevan a cabo un proceso de revisión por pares. Cabe resaltar que, de las 144 revistas, 119 son publicaciones arbitradas, denotando la calidad de la producción editorial universitaria.<br></p>
                        <p><strong>Soporte</strong>. Categoría en la que se identifica el formato de publicación de la revista, puede ser impreso, electrónico o ambos. En la actualidad la mayor parte de las revistas que conforman el Portal manejan ambos soportes, logrando una mayor visibilidad a nivel nacional e internacional.<br></p>
                        <p><strong>Indexación</strong>. En el Portal se incluye información acerca de la indización de cada revista en los principales índices y bases de datos hemerográficas internacionales (Scopus, Web of Science, Scielo Citation Index) y nacionales (Scielo, Catálogo Latindex y el Índice de Revistas Mexicanas de Investigación Científica y Tecnológica). Como parte de la información detallada de cada revista podrá consultar los demás índices y bases de datos.<br></p>
                        <p><strong>Entidad editora</strong>. Las revistas se pueden consultar según la facultad, escuela, instituto o dependencia académica que las edita. Esta clasificación nos da un panorama general de producción editorial dentro de la UNAM.<br></p>
                        <p><strong>Subsistema</strong>. Las entidades editoras están adscritas a un subsistema específico dentro del organigrama de la Universidad: Administración Central, Facultades y Escuelas, Coordinación de Difusión Cultural, Coordinación de Estudios de Posgrado, Coordinación de Humanidades, Coordinación de Investigación Científica.<br></p>
                        <p><strong>Vigencia</strong>. Dentro del universo de 203 revistas, 144 son los títulos vigentes y se incluyen 59 revistas descontinuadas puesto que, aunque hayan terminado su vida productiva, los materiales que en ellas se difunden siguen siendo de gran interés para la comunidad y el hecho de retomarlas en este portal les da visibilidad y presencia dentro de las publicaciones periódicas de la UNAM.<br></p>
                        <h4>Procedimiento de inclusión<br></h4>
                        <p>El procedimiento que se debe seguir para incluir una revista al portal es el siguiente:<br></p>
                        <ul>
                            <li>Ser editada o coeditada por alguna de las entidades de la UNAM.<br></li>
                            <li>Ponerse en contacto con el equipo de la Subdirección de Revistas Académicas y Publicaciones Digitales de la Dirección General de Publicaciones y Fomento Editorial al correo <a href="mailto:revistas@unam.mx">revistas@unam.mx</a><br></li>
                            <li>Se le enviará al director o editor de la revista un formulario en el que se incluirán los datos específicos de la publicación.<br></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    	</div>
    </div>
@endsection