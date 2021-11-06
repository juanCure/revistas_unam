<!-- This is the public header template -->
<div class="jumbotron jumbotron-fluid jumbotron-main">
    <div class="text-dark d-flex justify-content-end" style="height: 34px;/*border-radius: 4px;*/background: linear-gradient(0deg, black 51%, rgb(55,55,55)), #1d2023;">
        <div class="d-lg-flex align-items-lg-center" id="share_container" style="/*height: 100%;*/min-width: 100px;"><a class="d-inline-block d-lg-flex align-items-lg-center share" href=""><i class="fa fa-facebook-square"></i></a><a class="d-inline-block d-lg-flex align-items-lg-center share" href=""><i class="fa fa-twitter"></i></a><a class="d-inline-block d-lg-flex align-items-lg-center share" id="send_mail" href=""><i class="fas fa-envelope"></i></a></div>
    </div>
    <div id="jumbotron_background" class="a"></div>
    <div class="container center-vertically-holder" style="margin-top:-20px;">
        <div class="row" style="padding-top: 34px;padding-bottom: 10px;margin-top: 0;">
            <div class="col-6 col-md-4 col-lg-2 col-xl-2 d-flex d-xl-flex justify-content-md-start justify-content-xl-end align-items-xl-center"><img class="img-fluid" id="logo_unam" src="img/logo%20revistas_blanco.svg"></div>
            <div class="col-6 col-md-8 col-lg-10 col-xl-10 d-flex justify-content-xl-end align-items-xl-start">
                <div class="d-flex justify-content-end align-items-start" style="position: relative;/*width: 100%;*/">
                    <nav class="navbar navbar-light navbar-expand-md navigation-clean" id="mainMenu">
                        <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" id="nav_bar"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navcol-1" style="background: rgba(255,255,255,0.77);">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"><a class="nav-link active" href="index.html">Incio</a></li>
                                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">Sobre Revistas</a>
                                        <div class="dropdown-menu"><a class="dropdown-item" href="informacion.html">Información General</a><a class="dropdown-item" href="Normas.html">Normas Operativas</a><a class="dropdown-item" href="Estructuras.html">Estructuras Organizacionales</a></div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="ingreso.html">Lineamientos universitarios</a></li>
                                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">Servicios</a>
                                        <div class="dropdown-menu"><a class="dropdown-item" href="profesionalizacion.html">Profesionalización de Editores</a><a class="dropdown-item" href="asesorías.html">Asesorías y Consulta</a><a class="dropdown-item" href="programa.html">Programa de Cursos y Talleres</a><a class="dropdown-item" href="plataforma.html">Plataforma de Gestión Editorial</a><a class="dropdown-item" href="diseno.html">Diseño Gráfico Web&nbsp;</a><a class="dropdown-item" href="derechos.html">Derechos de Autor</a></div>
                                    </li>
                                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">Temas de interés</a>
                                        <div class="dropdown-menu"><a class="dropdown-item" href="material.html">Material de apoyo</a><a class="dropdown-item" href="enlaces.html">Enlaces</a><a class="dropdown-item" href="open_access.html">Open Access</a></div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="ingreso.html">Contacto</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div id="open_acces_logo"><img class="img-fluid" src="img/open-access-logo.png"></div>
                </div>
            </div>
        </div>
        <section id="searchForm">
            <div class="row d-md-flex justify-content-md-center">
                <div class="col-md-10 col-xl-10 offset-xl-1">
                    <form action="{{ route('solr.basic.search') }}" method="POST" name="busqueda">
                        @csrf
                        <div class="form-row">
                            <div class="col-6 col-md-4 d-flex d-xl-flex justify-content-center align-items-md-end justify-content-xl-start align-items-xl-center">
                                <div class="form-check"><input {{ (isset($idMod) && $idMod == '1') ? 'checked' : '' }} class="form-check-input" type="radio" id="formCheck-1" name="idMod" value="1"><label class="form-check-label" for="formCheck-1">Por revista</label></div>
                            </div>
                            <div class="col-6 col-md-4 d-flex d-xl-flex justify-content-center align-items-md-end justify-content-xl-start align-items-xl-center">
                                <div class="form-check"><input {{ (!isset($idMod)) ? "checked" : ((isset($idMod) && $idMod == '0') ? 'checked' : '') }} class="form-check-input" type="radio" id="formCheck-2" name="idMod" value="0"><label class="form-check-label" for="formCheck-2">Por artículo</label></div>
                            </div>
                            <div class="col-md-4 d-none d-md-block" id="empty_col"></div>
                            <div class="col">
                                <div class="form-row padMar">
                                    <div class="col-12 col-sm-10 col-md-8 offset-sm-1 offset-md-0 d-xl-flex align-items-xl-center padMar">
                                        <div class="input-group">
                                            <div class="input-group-prepend" id="subheading-1" style="width: 100%;clear: both;"></div>
                                            <input name="buscar" class="form-control autocomplete" type="text" placeholder="Buscar..." style="height: 40px;position: static;">
                                            <div class="input-group-append">
                                                {{-- <a class="btn" role="button" href="results_journal.html" style="height: 40px;background: linear-gradient(#ff584d 0%, #ff892d 56%, rgb(255,171,45) 85%), #FF892D;color: rgb(33, 37, 41);" data-target="results_journal.html"><i class="fa fa-search" style="color: rgb(255,255,255);"></i></a> --}}
                                                <button class="btn btn-warning" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4 d-flex d-xl-flex justify-content-center align-items-md-center justify-content-xl-center align-items-xl-center"><a class="d-flex align-items-center align-items-xl-center" id="advanced_search" href="#advanced_search_col" data-toggle="collapse">Búsqueda avanzada<i class="icon ion-android-arrow-dropright-circle d-block" style="font-size: 1.4em;"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <form class="d-xl-flex justify-content-xl-start">
            <div class="form-row" style="width: 100%;">
                <div class="col collapse" id="advanced_search_col">
                    <div class="container text-center d-flex d-xl-flex justify-content-center align-items-center justify-content-md-start justify-content-xl-center align-items-xl-center">
                        <div class="form-row d-flex justify-content-center justify-content-md-start" style="width: 100%;">
                            <div class="col-12 col-md-6 d-flex justify-content-start">
                                <div class="form-row" style="width: 100%;">
                                    <div class="col-12 d-flex justify-content-start advanced_span_col"><span class="advanced_span_col" style="display: initial;">En la(s)&nbsp; revista(s):</span></div>
                                    <div class="col-12"><select class="form-control advanced_select" id="journal_select">
                                            <option value="12" selected="">Selecciona una revista</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6" id="year_col">
                                <div class="form-row" style="border-left: solid 1px;">
                                    <div class="col-12 d-flex justify-content-start advanced_span_col"><span class="advanced_span_col" style="display: initial;margin-left: 55px;">Periodo de publicación:</span></div>
                                    <div class="col-12 col-sm-6 d-flex justify-content-start align-items-center justify-content-sm-start justify-content-xl-end input_col"><label class="text-left year_label">Desde</label><select class="form-control advanced_select" id="select_from">
                                            <option value="" selected="false" class="place_holder_year" disabled="true">Año</option>
                                        </select></div>
                                    <div class="col-12 col-sm-6 d-flex justify-content-start align-items-center justify-content-xl-end input_col"><label class="text-left year_label">Hasta</label><select class="form-control advanced_select" id="select_to">
                                            <option value="default" selected="false" class="place_holder_year" disabled="true">Año</option>
                                        </select></div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5 input_col"><label style="display: flex;">Autor:</label><input class="form-control advanced_select advanced_input" type="text"></div>
                            <div class="col-12 col-lg-6 col-xl-5 input_col"><label style="display: flex;">Título:</label><input class="form-control advanced_select advanced_input" type="text"></div>
                            <div class="col d-flex justify-content-end align-items-center justify-content-xl-end align-items-xl-end input_col"><button class="btn btn-danger" type="button" style="height: 40px;background: linear-gradient(#ff584d 0%, #ff892d 56%, rgb(255,171,45) 85%), #FF892D;/*color: rgb(33, 37, 41);*/letter-spacing: 2px;">Buscar</button></div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-10 col-md-10 col-xl-10 offset-sm-1 offset-md-1 offset-xl-2 d-md-flex justify-content-md-start">
                    <h6 class="text-center" id="subheading-2" style="padding-left: 5px;padding-top: 5px;">Catálogo actualizado de 145 revistas, más de 37 000 artículos completos&nbsp;</h6>
                </div>
            </div>
        </form>
    </div>
</div>