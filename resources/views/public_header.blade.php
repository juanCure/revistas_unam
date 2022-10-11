<!-- This is the public header template -->
<div class="jumbotron jumbotron-fluid jumbotron-main">
    <div class="text-dark d-flex justify-content-end" style="height: 34px;/*border-radius: 4px;*/background: linear-gradient(0deg, black 51%, rgb(55,55,55)), #1d2023;">
        <div class="d-lg-flex align-items-lg-center" id="share_container" style="/*height: 100%;*/min-width: 100px;"><a class="d-inline-block d-lg-flex align-items-lg-center share" href="https://www.facebook.com/revistasunam" target="_blank"><i class="fa fa-facebook-square"></i></a><a class="d-inline-block d-lg-flex align-items-lg-center share" href=" https://twitter.com/revistasunam" target="_blank"><i class="fa fa-twitter"></i></a><a class="d-inline-block d-lg-flex align-items-lg-center share" id="send_mail" href="mailto:revistas@unam.mx"><i class="fas fa-envelope"></i></a></div>
    </div>
    <div id="jumbotron_background" class="a"></div>
    <div class="container center-vertically-holder form_search_col" style="margin-top:-20px;">
        <div class="row" style="padding-top: 34px;padding-bottom: 10px;margin-top: 0;">
            <div class="col-6 col-md-2 col-lg-2 col-xl-2 offset-md-1 offset-lg-0 d-flex d-xl-flex justify-content-md-start justify-content-xl-end align-items-xl-center"><a href="{{ route('inicio') }}"><img class="img-fluid" id="logo_unam" src="{{ asset('img/logo%20revistas_blanco.svg') }}"></a></div>
            <div class="col-6 col-md-10 col-lg-10 col-xl-10 d-flex justify-content-xl-end align-items-xl-start">
                <div class="d-flex justify-content-end align-items-start" style="position: relative;/*width: 100%;*/">
                    <nav class="navbar navbar-light navbar-expand-md sticky-top navigation-clean" id="mainMenu" style="/*overflow: hidden;*/">
                        <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1" id="nav_bar"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                            <div class="collapse navbar-collapse" id="navcol-1" style="background: rgba(255,255,255,0.77);">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item"><a href="{{ route('inicio') }}" class="nav-link active">Inicio</a></li>
                                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">Revistas UNAM</a>
                                        <div class="dropdown-menu"><a class="dropdown-item" href="{{ route('static.information') }}">Información general</a><a class="dropdown-item" href="{{ route('static.normas') }}">Normas operativas</a><a class="dropdown-item" href="{{ route('static.estructuras') }}">Organización</a></div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('static.lineamientos') }}">Lineamientos</a></li>
                                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">Servicios</a>
                                        <div class="dropdown-menu">
                                            {{-- <a href="{{ route('login') }}" class="dropdown-item">Iniciar Sesión</a> --}}
                                            <a class="dropdown-item" href="{{ route('static.profesionalizacion') }}">Profesionalización editorial</a><a class="dropdown-item" href="{{ route('static.asesorias') }}">Asesorías y consultorías</a><a class="dropdown-item" href="{{ route('static.plataforma') }}">Plataformas de gestión editorial</a><a class="dropdown-item" href="{{ route('static.disenio') }}">Digitalización y diseño web</a><a class="dropdown-item" href="{{ route('static.issn') }}">ISBN, ISSN y DOI</a></div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="https://www.publicaciones.unam.mx/servicios/es/talleres-2022-2" target="_blank">Talleres 2022-2</a></li>
                                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">Recursos</a>
                                        <div class="dropdown-menu"><a class="dropdown-item" href="{{ route('static.material') }}">Material de apoyo</a><a class="dropdown-item" href="{{ route('static.enlaces') }}">Enlaces</a><a class="dropdown-item" href="{{ route('static.acceso') }}">Open Access</a></div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('static.contacto')}}">Contacto</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <div id="open_acces_logo"><img class="img-fluid" src="{{ asset('img/open-access-logo.png')}}"></div>
                </div>
            </div>
        </div>
        <section id="searchForm">
            <div class="row d-md-flex justify-content-md-center">
                <div class="col-md-10 col-xl-9 form_search_col">
                    <form action="{{ route('solr.basic.search') }}" method="POST" name="busqueda">
                        @csrf
                        <div class="form-row" id="search_row">
                            <div class="col-6 col-md-4 d-flex d-xl-flex justify-content-center align-items-md-end justify-content-xl-start align-items-xl-center">
                                <div class="form-check"><input {{ (isset($idMod) && $idMod == '1') ? 'checked' : '' }} class="form-check-input" type="radio" id="formCheck-1" name="idMod" value="1"><label class="form-check-label" for="formCheck-1">Por revista</label></div>
                            </div>
                            <div class="col-6 col-md-4 d-flex d-xl-flex justify-content-center align-items-md-end justify-content-xl-start align-items-xl-center">
                                <div class="form-check"><input {{ (!isset($idMod)) ? "checked" : ((isset($idMod) && $idMod == '0') ? 'checked' : '') }} class="form-check-input" type="radio" id="formCheck-2" name="idMod" value="0"><label class="form-check-label" for="formCheck-2">Por artículo</label></div>
                            </div>
                            <div class="col-md-4 d-none d-md-block" id="empty_col"></div>
                            <div class="col">
                                <div class="form-row padMar">
                                    <div class="col-12 col-sm-6 col-md-7 col-xl-9 offset-sm-1 offset-md-0 d-xl-flex align-items-xl-center padMar">
                                        <div class="input-group">
                                            <div class="input-group-prepend" id="subheading-1"></div>
                                            <input name="buscar" class="form-control autocomplete" type="text" id="search_input" placeholder="Buscar…"">
                                            <div class="input-group-append">
                                                <button class="btn" type="submit" style="color: #ffffff;     background-color: #f48838;     border-color: #f48838;"><i class="fa fa-search" style="color: rgb(255,255,255);"></i></button></div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-5 col-md-5 col-xl-3 d-flex d-xl-flex justify-content-center align-items-end align-items-md-end align-items-lg-end justify-content-xl-center align-items-xl-end">
                                            <div><a class="d-flex align-items-center align-items-xl-center" id="advanced_search" href="#advanced_search_col" data-toggle="collapse">Búsqueda avanzada<i class="icon ion-android-arrow-dropright-circle d-block" style="font-size: 1.4em;"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-10 col-md-12 offset-sm-1 offset-md-0">
                                <div style="padding-top: 5px;"><span style="/*margin-top: 200px;*/">Portal con 149 revistas y acceso a más de 40,000 artículos a texto completo.<br></span></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        {{-- The advance searching form --}}
        <form action="{{ route('solr.advanced.search') }}" method="POST" name="advanced" class="d-xl-flex justify-content-xl-start">
            @csrf
            <div class="form-row" style="width: 100%;">
                <div class="col collapse" id="advanced_search_col">
                    <div class="container text-center d-flex d-xl-flex justify-content-center align-items-center justify-content-md-start justify-content-xl-center align-items-xl-center">
                        <div class="form-row d-flex justify-content-center justify-content-md-start" style="width: 100%;">
                            <div class="col-12 col-md-6 d-flex justify-content-start">
                                <div class="form-row" style="width: 100%;">
                                    <div class="col-12 d-flex justify-content-start advanced_span_col"><span class="advanced_span_col" style="display: initial;">En la(s)&nbsp; revista(s):</span></div>
                                    <div class="col-12">
                                        @inject('solrService', 'App\Services\SolrService')
                                        <select name="requested_journal" class="form-control advanced_select" id="journal_select">
                                            <option value="" selected="">Selecciona una revista</option>
                                            {{-- @foreach ($harvestedJournals as $journal => $value) --}}
                                            @foreach ($solrService->getHarvestedJournals() as $journal)
                                            <option value="{{ $journal }}" {{ (isset($requested_journal) && $journal == $requested_journal) ? 'selected' : '' }}>{{ $journal }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6" id="year_col">
                                <div class="form-row" style="border-left: solid 1px;">
                                    <div class="col-12 d-flex justify-content-start advanced_span_col"><span class="advanced_span_col" style="display: initial;margin-left: 55px;">Periodo de publicación:</span></div>
                                    <div class="col-12 col-sm-6 d-flex justify-content-start align-items-center justify-content-sm-start justify-content-xl-end input_col"><label class="text-left year_label">Desde</label>
                                        <select name="publish_date_from" class="form-control advanced_select" id="select_from">
                                            {{-- <option value="" selected="false" class="place_holder_year" disabled="true">Año</option> --}}
                                            <option value="" selected="" class="place_holder_year">Año</option>
                                            @foreach ($solrService->getPublishingDates() as $date)
                                            <option value="{{ $date }}" {{ (isset($published_date_from) && $date == $published_date_from) ? 'selected' : '' }}>{{ $date }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 col-sm-6 d-flex justify-content-start align-items-center justify-content-xl-end input_col"><label class="text-left year_label">Hasta</label>
                                        <select name="publish_date_to" class="form-control advanced_select" id="select_to">
                                            {{-- <option value="default" selected="false" class="place_holder_year" disabled="true">Año</option> --}}
                                            <option value="" selected="" class="place_holder_year">Año</option>
                                            @foreach ($solrService->getPublishingDates() as $date)
                                            <option value="{{ $date }}" {{ (isset($published_date_to) && $date == $published_date_to) ? 'selected' : '' }}>{{ $date }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5 input_col">
                                <label style="display: flex;">Autor:</label>
                                <input name="author_name" class="form-control advanced_select advanced_input" type="text" value="{{ isset($author_name) ? $author_name : ''}}">
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5 input_col">
                                <label style="display: flex;">Título:</label>
                                <input name="searchTerm" class="form-control advanced_select advanced_input" type="text" value="{{ isset($searchTerm) ? $searchTerm : ''}}">
                            </div>
                            <div class="col d-flex justify-content-end align-items-center justify-content-xl-end align-items-xl-end input_col"><button class="btn btn-danger" type="button" style="color: #ffffff;     background-color: #f48838;     border-color: #f48838; height:35px; width:100%; margin-bottom:3px;">Buscar</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>        
    </div>
</div>