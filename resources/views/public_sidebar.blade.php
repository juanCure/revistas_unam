{{-- Tipos de revistas indices --}}
<aside class="col-md-3">
    <div class="card">
        <article class="card-group-item">
            <header class="card-header">
                <h6 class="title">
                    Tipo de Revistas
                </h6>
            </header>
            <div class="filter-content">
                <div class="card-body">
                    <ul>
                        @foreach ($tipos_revistas as $revista)
                            <li><span><a href="{{ route('revistas.tipo', ['tipo' => $revista->tipo_revista]) }}">
                                {{ $revista->tipo_revista }}
                            </a></span></li>
                        @endforeach
                        <li><span><a href="{{ route('revistas.all')}}">Todos los tipos</a></span></li>
                    </ul>
                </div>
            </div>
        </article>
    </div>
    {{-- Areas de conocimiento indices --}}
    <br>
    <div class="card">
        <article class="card-group-item">
            <header class="card-header">
                <h6 class="title">
                    Áreas de Conocimiento
                </h6>
            </header>
            <div class="filter-content">
                <div class="card-body">
                    <ul>
                        @foreach ($areas_conocimiento as $area)
                            <li><a href="{{ route('revistas.area', ['area_id' => $area->id ])}}">{{ $area->nombre }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </article>
    </div>
    {{-- Sistemas Indexadores --}}
    <br>
    <div class="card">
        <article class="card-group-item">
            <header class="card-header">
                <h6 class="title">
                    Indexaciones
                </h6>
            </header>
            <div class="filter-content">
                <div class="card-body">
                    <ul>
                        @foreach ($indexadores as $indice)
                            <li><a href="{{ route('revistas.indexaciones', ['indice_id' => $indice->id ])}}">{{ $indice->nombre }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </article>
    </div>

    <br>
    <div class="card">
        <article class="card-group-item">
            <header class="card-header">
                <h6 class="title">
                    OTROS ÍNDICES
                </h6>
            </header>
            <div class="filter-content">
                <div class="card-body">
                    <ul>
                        <li>
                            <a href="{{ route('subsistemas.all') }}">Subsistemas de la UNAM</a>
                        </li>
                        <li>
                            <a href="{{ route('entidades.all') }}">Entidades académicas de la UNAM</a>
                        </li>
                        <li>
                            <a href="{{ route('revistas.old') }}">Revistas Descontinuadas</a>
                        </li>
                        <li>
                            <a href="{{ route('revistas.all') }}">Todos los títulos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </article>
    </div>
</aside>