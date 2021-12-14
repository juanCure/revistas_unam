{{-- Tipos de revistas indices --}}

<div class="col-lg-3 order-2 order-lg-1 cards_col">
    @inject('indicesServicio', 'App\Services\IndicesServicio')
    <div class="card" id="card_tipos">
        <h4 class="d-xl-flex align-items-xl-center card-title"><span>Tipos de revistas</span></h4>
        <div class="card-body">
            <div>
                <ul class="list-group" id="tipos_list">
                    @foreach ($tipos_revistas = $indicesServicio->getIndices()['typos'] as $revista)
                        <li class="list-group-item"><a href="{{ route('revistas.tipo', ['tipo' => $revista->tipo_revista]) }}">
                            <i class="fa fa-chevron-right"></i>{{ $revista->tipo_revista }}
                        </a></li>
                    @endforeach
                    <li class="list-group-item"><a href="{{ route('revistas.all')}}"><i class="fa fa-chevron-right"></i>Todos los tipos</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card">
        <h4 class="d-xl-flex align-items-xl-center card-title"><span>Áreas del Conocimiento</span></h4>
        <div class="card-body">
            <div>
                <ul class="list-group" id="areas_list">
                    @foreach ($areas_conocimiento = $indicesServicio->getIndices()['areas'] as $area)
                        <li class="list-group-item"><a href="{{ route('revistas.area', ['area_id' => $area->id ])}}"><i class="fa fa-chevron-right"></i>{{ $area->nombre }}</a></li>
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
                    @foreach ($indexadores = $indicesServicio->getIndices()['indexadores'] as $indice)
                        <li class="list-group-item"><a href="{{ route('revistas.indexaciones', ['indice_id' => $indice->id ])}}"><i class="fa fa-chevron-right"></i>{{ $indice->nombre }}</a></li>
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
                        <a href="{{ route('subsistemas.all') }}"><i class="fa fa-chevron-right"></i>Subsistemas de la UNAM</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('entidades.all') }}"><i class="fa fa-chevron-right"></i>Entidades académicas de la UNAM</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('revistas.old') }}"><i class="fa fa-chevron-right"></i>Revistas Descontinuadas</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ route('revistas.all') }}"><i class="fa fa-chevron-right"></i>Todos los títulos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>