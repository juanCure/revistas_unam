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
                        <p>En el Portal se incluyen todas las revistas que son editadas o coeditadas por las diferentes entidades de la UNAM, y que cumplen con los siguientes criterios mínimos:<br></p>
                        <ol>
                            <li>Contar con un dominio unam.mx<br></li>
                            <li>Difundir contenidos científicos, académicos o culturales.<br></li>
                            <li>Estar vigentes y cumplir con la periodicidad establecida.</li>
                            <li>Tener al menos dos números publicados.</li>
                            <li>Contar con registro ISSN correspondiente al soporte de publicación, o bien, informar que dicho registro está en trámite.</li>
                            <li>El registro en el portal da cuenta de la existencia de una revista, pero no certifica su calidad editorial; la cual se valida con la indexación de la revista en diversos sistemas de información.</li>
                        </ol>
                        <p>Actualmente el portal alberga más de 150 revistas que se clasifican bajo los siguientes criterios:<br></p>
                        <p><strong>Tipo de revista</strong>. Según su orientación, se dividen en cuatro categorías:<br></p>
                        <p><strong>Revistas de Investigación Científica</strong>. Aquellas que publican resultados de investigación y estudios originales. Son publicaciones arbitradas que cumplen con rigurosos estándares de calidad, lo cual las posiciona como revistas mexicanas a nivel internacional.<br></p>
                        <p><strong>Revistas Técnico-Profesionales</strong>. Difunden artículos y reseñas acerca del acontecer en un campo del conocimiento. Se incluyen investigaciones e información relevante sobre técnicas, herramientas y solución de problemas prácticos con el objetivo de contribuir al avance tecnológico y ampliar las fronteras del conocimiento.<br></p>
                        <p><strong>Revistas de Divulgación Científica</strong>. Ediciones cuyo objetivo es hacer accesible el conocimiento científico al público en general; difundir el resultado de investigaciones y nuevos descubrimientos científicos. Generalmente son publicaciones multidisciplinarias.<br></p>
                        <p><strong>Revistas Culturales</strong>. Órganos de comunicación de las entidades académicas cuyo objetivo es la difusión y el análisis de obras artísticas. Su contenido incluye artículos, reseñas, información sobre eventos, convocatorias y novedades, así como reportajes gráficos.<br></p>
                        <p><strong>Áreas del conocimiento</strong>. Con base en los criterios del Consejo Nacional de Ciencia y Tecnología (CONACyT), las revistas se catalogan de acuerdo a las siguientes áreas del conocimiento:<br></p>
                        <ol>
                            <li>Biología y Química<br></li>
                            <li>Biotecnología y Ciencias agropecuarias<br></li>
                            <li>Ciencias sociales y Económicas<br></li>
                            <li>Físico matemáticas y Ciencias de la Tierra<br></li>
                            <li>Artes y Humanidades<br></li>
                            <li>Ingeniería e Industria<br></li>
                            <li>Medicina y Ciencias de la conducta<br></li>
                            <li>Multidisciplinas<br></li>
                        </ol>
                        <p><strong>Arbitraje</strong>. Se detalla cuáles son las revistas que llevan a cabo un proceso de revisión por pares. Cabe resaltar que, de las más de 150 revistas, aproximadamente el 80% son publicaciones arbitradas, denotando el rigor y la calidad de la producción editorial universitaria.<br></p>
                        <p><strong>Soporte</strong>. Categoría en la que se identifica el formato de publicación de la revista, puede ser impreso, electrónico o ambos. En la actualidad el 98% de las revistas que conforman el portal ya publican en línea, logrando con ello una mayor visibilidad a nivel nacional e internacional.<br></p>
                        <p><strong>Indexación</strong>. En el portal se incluye información acerca de la indización de cada revista en los principales sistemas de información nacionales e internacionales: Scopus, Web of Science, DOAJ, Scielo, Redalyc, Scielo Citation Index, Dialnet, Catálogo Latindex y el Índice de Revistas Mexicanas de Investigación Científica y Tecnológica. Como parte de la información detallada de cada revista también se ofrece la posibilidad de consultar otros índices y bases de datos especializados en donde la revista se encuentre indizada.<br></p>
                        <p><strong>Entidad editora</strong>. Las revistas se pueden consultar según la facultad, escuela, instituto o dependencia académica que las edita. Esta clasificación nos da un panorama general de la producción editorial dentro de la UNAM.<br></p>
                        <p><strong>Subsistema</strong>. Las entidades editoras están adscritas a un subsistema específico dentro del organigrama de la Universidad: Administración Central, Facultades y Escuelas, Coordinación de Difusión Cultural, Coordinación de Estudios de Posgrado, Coordinación de Humanidades y Coordinación de Investigación Científica.<br></p>
                        <p><strong>Vigencia</strong>. Dentro del universo de las revistas de la UNAM, en el portal también se incluyen poco más de 50 revistas descontinuadas, puesto que, aunque hayan terminado su vida productiva, los materiales que en ellas se difunden siguen siendo de gran interés documental para la comunidad. El hecho de retomarlas en el portal les ofrece visibilidad y presencia dentro de las publicaciones periódicas de la UNAM. <br></p>
                        <h4>Procedimiento de inclusión<br></h4>
                        <p>El procedimiento que se sigue para incluir una revista al portal es el siguiente:<br></p>
                        <ul>
                            <li>Ser editada o coeditada por alguna de las entidades de la UNAM.<br></li>
                            <li>Ponerse en contacto con el equipo de la Subdirección de Revistas Académicas y Publicaciones Digitales de la Dirección General de Publicaciones y Fomento Editorial al correo <a href="mailto:revistas@unam.mx">revistas@unam.mx</a><br></li>
                            <li>Se le envía al director o editor de la revista un formulario para recopilar los datos específicos de la publicación.<br></li>
                            <li>Si la revista cumple con los criterios mínimos de las normas operativas, se integrará en el catálogo de este portal.<br></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    	</div>
    </div>
@endsection