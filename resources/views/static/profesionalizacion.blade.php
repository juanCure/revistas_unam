@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Profesionalización Editorial<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Profesionalización Editorial</h2>
                        <p>Los Consejos Editorial y de Publicaciones Académicas y Arbitradas de la UNAM, a través de la Dirección General de Publicaciones y Fomento Editorial (DGPyFE), con la finalidad de contribuir al mejoramiento continuo de la actividad editorial e impulsar la capacitación y profesionalización de los equipos editoriales universitarios, principalmente de esta casa de estudios, desde 2016 dieron marcha al <em>Programa para la Profesionalización de la Actividad Editorial en la UNAM</em>:<br></p>
                        <h4>Objetivo general:<br></h4>
                        <p>Contribuir a la profesionalización de la actividad editorial a través de la impartición de talleres de capacitación continua sobre el uso y aplicación de tecnologías y buenas prácticas internacionales que permitan elevar la calidad de la producción, publicación y difusión digital de las publicaciones académicas.<br></p>
                        <h4>Objetivos particulares:<br></h4>
                        <ul>
                            <li>Proporcionar capacitación sobre temas relevantes y de interés para los equipos editoriales.<br></li>
                            <li>Contribuir al intercambio de experiencias y a la generación de conocimientos que permitan desarrollar competencias profesionales entre la comunidad editora.<br></li>
                            <li>Fortalecer el desarrollo de capacidades que permitan un mayor uso y aprovechamiento de las tecnologías de información y comunicación en la actividad editorial.<br></li>
                            <li>Fomentar la creatividad para la elaboración de contenidos multimedia e interactivos que propicien la difusión eficaz de las publicaciones académicas.<br></li>
                        </ul>
                        <h4>Público al que está dirigido:<br></h4>
                        <p>Los talleres están dirigidos a editores, equipos editoriales y todos aquellos profesionales interesados en adquirir conocimientos que les permitan participar eficientemente en los procesos editoriales digitales de edición, publicación y distribución de libros y revistas académicas.<br></p>
                        <h4>Oferta académica:<br></h4>
                        <h5>A. Revistas académicas<br></h5>
                        <ol>
                            <li><strong>Uso de la plataforma de gestión editorial Open Journal Systems (OJS)</strong><br><strong>Temas:</strong>
                                <ol>
                                    <li>Instalación y configuración de la plataforma<br></li>
                                    <li>Gestión y administración de revistas y usuarios<br></li>
                                    <li>Configuración y diseño de revistas<br></li>
                                    <li>Publicación de artículos y números<br></li>
                                    <li>Proceso editorial completo<br></li>
                                    <li>Herramientas avanzadas<br></li>
                                </ol>
                            </li>
                            <li><strong>Difusión y visibilidad de las revistas académicas</strong><br><strong>Temas:</strong>
                                <ol>
                                    <li>Modelos de distribución<br></li>
                                    <li>Buenas prácticas editoriales<br></li>
                                    <li>Índices y bases de datos<br></li>
                                    <li>Indexación<br></li>
                                    <li>Bibliometría y factor de impacto<br></li>
                                </ol>
                            </li>
                        </ol>
                        <h5>B. Edición de libros académicos<br></h5>
                        <ol>
                            <li><strong>Uso de la plataforma de gestión editorial Open Monograph Press (OMP)</strong><br><strong>Temas:</strong>
                                <ol>
                                    <li>Instalación y configuración de la plataforma<br></li>
                                    <li>Gestión y administración de colecciones y usuarios<br></li>
                                    <li>Configuración y diseño de colecciones<br></li>
                                    <li>Publicación de libros y colecciones<br></li>
                                    <li>Proceso editorial de libros académicos<br></li>
                                    <li>Herramientas avanzadas<br></li>
                                </ol>
                            </li>
                            <li><strong>Producción y edición de eBooks (1)</strong><br><strong>Temas:</strong>
                                <ol>
                                    <li>Introducción a la edición y publicación de ePub (2)<br></li>
                                    <li>Conversión de archivos Word y PDF a ePub<br></li>
                                    <li>Producción de ePub’s con Dreamweaver y Sigil<br></li>
                                    <li>Generación de ePub’s con InDesign<br></li>
                                    <li>Herramientas de validación de ePub’s<br></li>
                                    <li>Producción de eBooks con iBooks Author<br></li>
                                </ol>
                            </li>
                            <li><strong>Producción y edición de eBooks (2)</strong><br><strong>Temas:</strong>
                                <ol>
                                    <li>Edición de ePub 3<br></li>
                                    <li>Producción de audio, video y animaciones<br></li>
                                    <li>ePub de maquetación fija (fixed layout) y ePub 3<br></li>
                                    <li>Animación para ePubs con Indesign CC<br></li>
                                    <li>Read-aloud para ePubs<br></li>
                                </ol>
                            </li>
                            <li><strong>Distribución de libros académicos</strong><br><strong>Temas:</strong>
                                <ol>
                                    <li>Canales de distribución comercial y no comercial<br></li>
                                    <li>Librerías virtuales<br></li>
                                    <li>Bibliotecas digitales<br></li>
                                    <li>Sistemas de gestión de pago<br></li>
                                    <li>Gestión de Derechos Digitales (DRM)<br></li>
                                </ol>
                            </li>
                        </ol>
                        <h5>C. Publicaciones Digitales<br></h5>
                        <ol>
                            <li><strong>Formatos de publicación digital</strong><br><strong>Temas:</strong>
                                <ol>
                                    <li>Fundamentos de hojas de estilo<br></li>
                                    <li>Formatos digitales (DOC, PDF, HTML y EPUB)<br></li>
                                    <li>Marcado en XML (metodología SciELO)<br></li>
                                    <li>Herramientas para la conversión de formatos<br></li>
                                </ol>
                            </li>
                            <li><strong>Derechos de autor</strong><br><strong>Temas:</strong>
                                <ol>
                                    <li>Introducción a los derechos de autor<br></li>
                                    <li>La LFDA<br></li>
                                    <li>La legislación Universitaria<br></li>
                                    <li>Trámites y licenciamientos<br></li>
                                    <li>Identificadores internacionales (ISSN, ISBN, DOI)<br></li>
                                    <li>Nuevas iniciativas (CC)<br></li>
                                    <li>El Acceso Abierto<br></li>
                                </ol>
                            </li>
                        </ol>
                        <h5>Costos</h5>
                        <ul>
                            <li><strong>Personal de la UNAM:</strong> Sin costo</li>
                            <li><strong>Alumnos de la UNAM y de otras instituciones:</strong> $1,000.00</li>
                            <li><strong>Público en general:</strong> $1,500.00</li>
                        </ul>
                        <h5>Informes<br></h5>
                        <p><a href="mailto:profesionalizacion@libros.unam.mx" target="_blank">profesionalizacion@libros.unam.mx</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection