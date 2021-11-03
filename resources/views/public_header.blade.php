<div class="jumbotron" style="background: linear-gradient(129deg, rgb(125,12,0), rgb(154,56,46)), var(--red);">
    <div class="row">
        <div class="col-6 col-md-12 col-lg-2 col-xl-2 d-flex d-xl-flex justify-content-md-center justify-content-xl-end align-items-xl-center"><a class="navbar-brand" style="width:250px;" href="{{ url('/') }}">
                    <img id="logo_unam" src="{{ asset('img/logo_revistas_blanco.svg') }}">
                </a></div>
        <div class="col-6 col-md-12 col-lg-10 col-xl-10 d-flex justify-content-end justify-content-xl-center">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean" id="mainMenu" style="background-color: transparent;">
                <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a class="nav-link active" href="#">Incio</a></li>
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">Sobre Revistas</a>
                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Enlace 1</a><a class="dropdown-item" href="#">Enlace 2<br></a><a class="dropdown-item" href="#">Enlace 3</a></div>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#">Lineamientos universitarios</a></li>
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">Servicios</a>
                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Enlace 1</a><a class="dropdown-item" href="#">Enlace 2<br></a><a class="dropdown-item" href="#">Enlace 3</a></div>
                            </li>
                            <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false" data-toggle="dropdown" href="#">Temas de interés</a>
                                <div class="dropdown-menu"><a class="dropdown-item" href="#">Enlace 1</a><a class="dropdown-item" href="#">Enlace 2<br></a><a class="dropdown-item" href="#">Enlace 3</a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center" id="searchRow">
        <form action="{{ route('solr.basic.search') }}" method="POST" name="busqueda">
        @csrf
        <div class="col-12 col-sm-10 col-lg-6">
            <div class="row">
                    <div class="col-12 d-flex justify-content-center align-items-xl-center" id="SearchOptionsCol" style="padding-left: 0;">
                        <div class="form-check searchType" style="/*clear: right;*/">
                            <input {{ (!isset($idMod)) ? "checked" : ((isset($idMod) && $idMod == '0') ? 'checked' : '') }} class="form-check-input" type="radio" id="idMod" name="idMod" value="0">
                            <label class="form-check-label">Por artículo</label>
                        </div>
                        <div class="form-check searchType" style="/*padding-left: 10%;*/">
                            <input {{ (isset($idMod) && $idMod == '1') ? 'checked' : '' }} class="form-check-input" type="radio" id="idMod" name="idMod" value="1">
                            <label class="form-check-label">Por Revista</label>
                        </div>
                        <button class="btn btn-danger btn-sm" id="advancedSearchButton" type="button" style="/*margin-top: 20px;*/">Búsqueda avanzada</button>
                    </div>
                    <div class="col-12">
                        <div class="row d-xl-flex justify-content-xl-center padMar" id="search_row">
                            <div class="col-12 d-xl-flex justify-content-xl-center padMar">
                                <div class="input-group">
                                    <div class="input-group-prepend"></div>
                                        <input name="buscar" class="form-control autocomplete" type="text" placeholder="Buscar por título" style="height: 50px;margin-top: .2px;">
                                    <div class="input-group-append" style="height: 49px;">
                                        <button class="btn btn-warning" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </form>
    </div>
</div>