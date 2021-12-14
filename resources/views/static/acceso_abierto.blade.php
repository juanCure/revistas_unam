@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('inicio') }}"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>Acceso Abierto<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">Acceso Abierto</h2>
                        <p>El Acceso Abierto (Open Access (OA) en inglés) es una forma de compartir información, generalmente resultados de investigación científica, sin ningún costo o restricción para el usuario. Es un movimiento internacional en el cual el autor o titular de los derechos de la obra autoriza el libre acceso para usar, distribuir, copiar y transmitir el trabajo públicamente en cualquier medio digital para cualquier finalidad responsable, sujeto a la debida atribución de autoría, así como el derecho de hacer un pequeño número de copias impresas para su uso personal (<a href="http://legacy.earlham.edu/~peters/fos/bethesda.htm" target="_blank">Bethesda Statement on Open Access Publishing</a>). Este movimiento sienta sus bases en las Declaraciones de Budapest (2002), Bethesda (2003) y Berlín (2003).<br></p>
                        <div class="d-flex justify-content-center align-items-center"><img src="{{ asset('img/enlaces/20080416222706!Openaccess.gif') }}" style="margin: 20px;min-width: 220px;"></div>
                        <h4>Acceso Abierto en la UNAM</h4>
                        <p>En el ámbito universitario, se han implementado diversas iniciativas desde la década de los años noventa. En 2006 la UNAM se adhiere a la Declaración de Berlín.&nbsp;A partir de 2011 se pone en marcha el programa Toda la UNAM en línea, en el que “se promueve el Acceso Abierto y la consulta libre y gratuita a través de Internet del contenido digital, producto de las actividades académicas, científicas, de investigación y culturales que se desarrollan en la UNAM, publicados por las entidades académicas y dependencias universitarias, así como de los recursos de los que la UNAM es depositaria y cuente con los derechos patrimoniales o con la autorización expresa de los autores” (Gaceta UNAM, 30 de agosto de 2014).<br></p>
                        <p>En la actualidad existe un <a href="http://ccud.unam.mx/docs/Acuerdo%20por%20el%20que%20se%20establecen%20los%20Lineamientos%20Generales%20para%20la%20Pol%C3%ADtica%20de%20Acceso%20Abierto%20de%20la%20Universidad%20Nacional%20Aut%C3%B3noma%20de%20M%C3%A9xico.pdf" target="_blank"><em>Acuerdo por el que se establecen los Lineamientos Generales para la Política de Acceso Abierto de la Universidad Nacional Autónoma de México</em></a> (publicado en Gaceta UNAM, 10 de septiembre de 2015).<br></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection