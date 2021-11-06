{{-- Tipos de revistas indices --}}

<div class="col-lg-3 order-2 order-lg-1 cards_col">
    <div class="card" id="card_tipos">
        <h4 class="d-xl-flex align-items-xl-center card-title"><span>Tipos de revistas</span></h4>
        <div class="card-body">
            <div>
                <ul class="list-group" id="tipos_list">
                    @foreach ($tipos_revistas as $revista)
                        <li><span><a href="{{ route('revistas.tipo', ['tipo' => $revista->tipo_revista]) }}">
                            {{ $revista->tipo_revista }}
                        </a></span></li>
                    @endforeach
                    <li><span><a href="{{ route('revistas.all')}}">Todos los tipos</a></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <h4 class="d-xl-flex align-items-xl-center card-title"><span>Áreas del Conocimiento</span></h4>
        <div class="card-body">
            <div>
                <ul class="list-group" id="areas_list">
                    @foreach ($areas_conocimiento as $area)
                        <li><a href="{{ route('revistas.area', ['area_id' => $area->id ])}}">{{ $area->nombre }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <h4 class="d-xl-flex align-items-xl-center card-title"><span>Indexaciones</span></h4>
        <div class="card-body">
            <div>
                <ul class="list-group" id="indexaciones_list">
                    @foreach ($indexadores as $indice)
                        <li><a href="{{ route('revistas.indexaciones', ['indice_id' => $indice->id ])}}">{{ $indice->nombre }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <h4 class="d-xl-flex align-items-xl-center card-title"><span>Otros Índices</span></h4>
        <div class="card-body">
            <div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ route('subsistemas.all') }}">Subsistemas de la UNAM</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('entidades.all') }}">Entidades académicas de la UNAM</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('revistas.old') }}">Revistas Descontinuadas</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('revistas.all') }}">Todos los títulos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>