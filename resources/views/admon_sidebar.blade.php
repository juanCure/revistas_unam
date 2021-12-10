{{-- Enlaces para gestionar los distintos elementos que contiene el sistema--}}
<div class="col-md-12">
    <aside>
        <div class="card">
            <article class="card-group-item">
                <header class="card-header">
                    <h6 class="title">
                        Administrador
                    </h6>
                </header>
                <div class="filter-content">
                    <div class="card-body">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('revistas.index') }}">Revistas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('areas_conocimiento.index') }}">Áreas de conocimiento</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frecuencias.index') }}">Frecuencias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('subsistemas.index') }}">Subsistemas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('entidad_editoras.index') }}">Entidad Editoras</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('editoriales.index') }}">Editoriales</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('idiomas.index') }}">Idiomas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('temas.index') }}">Temas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('indexadores.index') }}">Sistemas Indexadores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('responsables.index') }}">Responsables</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </article>
        </div>
    </aside>
</div>