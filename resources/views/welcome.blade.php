@extends('layouts.app')
@section('content')

   <!-- Here starts the content of the index view -->
    <div class="container" id="carousel-container">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="w-100 d-block" src="{{ asset('img/carousel/1.jpg')}}" alt="Slide Image"></div>
                <div class="carousel-item"><img class="w-100 d-block" src="{{ asset('img/carousel/2.jpg')}}" alt="Slide Image"></div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
        </div>
        <section></section>
    </div>
    <div class="container-fluid card_container" style="/*background: #f5f5f5;*/">
        <div class="row no-gutters d-xl-flex justify-content-xl-center card_row">
            <div class="col-10 col-xl-8 offset-1 offset-xl-0">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tipos de revistas</h4>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5 col-lg-5 d-xl-flex align-items-xl-center">
                                <ul class="list-group highcharts_list" id="tipos_list">
                                    @foreach ($tipos_revistas as $revista)
                                        <li class="list-group-item">
                                            <a href="{{ route('revistas.tipo', ['tipo' => $revista->tipo_revista]) }}"><i class="fa fa-chevron-right"></i>
                                                {{ $revista->tipo_revista }}</a></li>
                                    @endforeach
                                    <li class="list-group-item"><a href="{{ route('revistas.todos.tipos')}}"><i class="fa fa-chevron-right"></i>Todos los tipos</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-7 col-lg-7 chart_col" id="pie_typos_chart" style="width:500px; height:300px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters d-xl-flex justify-content-xl-center card_row">
            <div class="col-10 col-xl-8 offset-1 offset-xl-0">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Áreas del conocimiento</h4>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <ul class="list-group highcharts_list" id="areas_list">
                                    @foreach ($areas_conocimiento as $area)
                                        <li class="list-group-item"><a href="{{ route('revistas.area', ['area_id' => $area->id ])}}"><i class="fa fa-chevron-right"></i>{{ $area->nombre }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-12 col-md-7 chart_col" id="areas"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters d-xl-flex justify-content-xl-center card_row">
            <div class="col-10 col-xl-8 offset-1 offset-xl-0">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Indexaciones</h4>
                        <div class="row no-gutters">
                            <div class="col-12 col-md-5">
                                <ul class="list-group highcharts_list" id="indexaciones_list">
                                    @foreach ($indexadores as $indice)
                                        <li class="list-group-item"><a href="{{ route('revistas.indexaciones', ['indice_id' => $indice->id ])}}"><i class="fa fa-chevron-right"></i>{{ $indice->nombre }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-12 col-md-7 chart_col" id="pie_indexaciones_chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row no-gutters d-xl-flex justify-content-xl-center card_row">
            <div class="col-10 col-xl-8 offset-1 offset-xl-0">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Otros Índices</h4>
                        <div class="row no-gutters">
                            <div class="col-12">
                                <div style="border: solid rgb(164,164,164) 1px;">
                                    <ul class="list-group" style="max-width: 100% !important;/*margin: 0;*//*padding: 0;*/">
                                        <li class="list-group-item"><a href="{{ route('subsistemas.all') }}"><i class="fa fa-chevron-right"></i>Subsistemas de la UNAM</a></li>
                                        <li class="list-group-item"><a href="{{ route('entidades.all') }}"><i class="fa fa-chevron-right"></i>Entidades académicas de la UNAM</a></li>
                                        <li class="list-group-item"><a href="{{ route('revistas.old') }}"><i class="fa fa-chevron-right"></i>Revistas Descontinuadas</a></li>
                                        <li class="list-group-item"><a href="{{ route('revistas.todos.titulos') }}"><i class="fa fa-chevron-right"></i>Todos los títulos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row no-gutters d-xl-flex justify-content-xl-center card_row issues_row">
            <div class="col-10 col-xl-8 offset-1 offset-xl-0">
                <h6 class="heading_sub">Números recientes</h6>
                <div class="row" id="issues_row" style="margin-top: 20px;">
                    <div class="col-12 col-sm-6 col-lg-3 d-flex d-xl-flex justify-content-center justify-content-xl-center issue_col">
                        <div class="issue" style="width: 150px;"><img class="img-fluid" src="{{ asset('img/samplers/1.jpg')}}"></div><span class="issue_title">Investigaciones Estéticas</span>
                        <div class="issue_data"><span class="issue_type">Investigación</span><span class="issue_num">Num.117</span></div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 d-flex d-xl-flex justify-content-center justify-content-xl-center issue_col">
                        <div class="issue" style="width: 150px;"><img class="img-fluid" src="{{ asset('img/samplers/2.jpg')}}"></div><span class="issue_title">Investigaciones Estéticas</span>
                        <div class="issue_data"><span class="issue_type">Investigación</span><span class="issue_num">Num.117</span></div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 d-flex d-xl-flex justify-content-center justify-content-xl-center issue_col">
                        <div class="d-xl-flex align-items-xl-center issue" style="width: 150px;"><img class="img-fluid" src="{{ asset('img/samplers/3.jpg')}}"></div><span class="issue_title">Investigaciones Estéticas</span>
                        <div class="issue_data"><span class="issue_type">Investigación</span><span class="issue_num">Num.117</span></div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 d-flex d-xl-flex justify-content-center justify-content-xl-center issue_col">
                        <div class="issue" style="width: 150px;"><img class="img-fluid" src="{{ asset('img/samplers/4.jpg')}}"></div><span class="issue_title">Investigaciones Estéticas</span>
                        <div class="issue_data"><span class="issue_type">Investigación</span><span class="issue_num">Num.117</span></div>
                    </div>
                </div>
                <div></div>
            </div>
        </div> --}}
        <div class="row no-gutters d-xl-flex justify-content-xl-center card_row issues_row">
            <div class="col-10 col-xl-8 offset-1 offset-xl-0">
                <h6 class="heading_sub">Sitios relacionados</h6>
                <div class="d-flex d-lg-flex d-xl-flex justify-content-center justify-content-lg-center justify-content-xl-center">
                    <div class="row d-flex justify-content-center" id="related_sites_row">
                        <div class="col d-xl-flex justify-content-xl-center align-items-xl-center"><a href="https://www.publicaciones.unam.mx/" target="_blank"><img class="img-fluid" src="{{ asset('img/sites/publicaciones_fomento_editorial.svg')}}"></a></div>
                        <div class="col d-flex d-xl-flex justify-content-center justify-content-xl-center align-items-xl-center"><a href="http://www.librosoa.unam.mx/" target="_blank"><img class="img-fluid" src="{{ asset('img/sites/libros_unam_open_access.svg')}}"></a></div>
                        <div class="col d-flex d-xl-flex justify-content-end justify-content-xl-center align-items-xl-center"><a href="http://www.libros.unam.mx/" target="_blank"><img class="img-fluid" src="{{ asset('img/sites/libros_unam.svg')}}"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Here ends the container for the index view -->


    {{-- Bibliotecas javascript y código para renderizar una gráfica Highcharts --}}
    {{-- <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/cylinder.js"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {

            var BASE_URL = {!! json_encode(url('/')) !!};
            var typos_count =  <?php echo json_encode($typos_count); ?>;
            var areas_count = <?php echo json_encode($areas_count); ?>;
            var indexaciones_count = <?php echo json_encode($indexaciones_count); ?>;
            // console.log("this is indexaciones_count: ", indexaciones_count);
            // Definiendo el objeto options para la gráfica tipos_revistas
            var options_typos = {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45
                    },
                    renderTo: 'pie_typos_chart',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Tipos de revistas'
                },
                 tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>',
                    percentageDecimals: 1
                },
                plotOptions: {
                    pie: {
                        // innerSize: 35,
                        depth: 35,
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ Math.round(this.percentage) +' %';
                            }
                        }
                    },
                    series: {
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function(event){
                                    location.href = BASE_URL + "/revistasPorTipo?tipo=" + this.name;
                                }
                            }
                        }
                    }
                },
                series: [{
                    name:'total'
                }]
            }
            myarray = [];
            $.each(typos_count, function(index, val) {
                myarray[index] = [val.tipo_revista, val.count];
            });
            options_typos.series[0].data = myarray;
            chart_typos = new Highcharts.Chart(options_typos);

            // Definiendo el objeto options para la gráfica areas_conocimiento

            var options_areas = {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    },
                    renderTo: 'areas',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Áreas de conocimiento'
                },
                 tooltip: {
                    pointFormat: '{series.name}: <b>{point.y}</b>',
                    percentageDecimals: 1
                },
                plotOptions: {
                    pie: {
                        innerSize: 50,
                        depth: 45,
                        allowPointSelect: true,
                        cursor: 'pointer',
                            dataLabels: {
                            enabled: true,
                            color: '#000000',
                            connectorColor: '#000000',
                            formatter: function() {
                                return '<b>'+ this.point.name +'</b>: '+ Math.round(this.percentage) +' %';
                            }
                        }
                    },
                    series: {
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function(event){
                                    // console.log(this.index + 1, " -> ", this.name);
                                    location.href = BASE_URL + "/revistasPorArea?area_id=" + (this.index + 1);
                                }
                            }
                        }
                    }
                },
                series: [{
                    type:'pie',
                    name:'total'
                }]
            }
            myarray = [];
            $.each(areas_count, function(index, val) {
                myarray[index] = [val.nombre, val.revistas_count];
            });
            options_areas.series[0].data = myarray;
            chart_areas = new Highcharts.Chart(options_areas);

            // Definiendo el objeto options para la gráfica indexaciones
            //
            var indexaciones_options = {
                chart: {
                    renderTo: 'pie_indexaciones_chart',
                    // type: 'column',
                    options3d: {
                        enabled: true,
                        alpha: 15,
                        beta: 15,
                        depth: 75,
                        viewDistance: 50
                    }
                },
                title: {
                    text: 'Indexaciones'
                },
                tooltip: {
                    // pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    pointFormat: '{series.name}: <b>{point.y}</b>'
                },
                plotOptions: {
                    cylinder: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        // depth: 75,
                        dataLabels: {
                            enabled: true,
                            // format: '{point.name}'
                            formatter: function() {
                                // return '<b>'+ this.point.name +'</b>: '+ this.point.y;
                            }
                        }
                    },
                    series: {
                        // depth: 75,
                        colorByPoint: true,
                        cursor: 'pointer',
                        point: {
                            events: {
                                click: function(event){
                                    // console.log(this.index + 1, " -> ", this.name);
                                    location.href = BASE_URL + "/revistasPorIndexaciones?indice_id=" + (this.index + 1);
                                }
                            }
                        }
                    }
                },
                xAxis: {
                    type: 'category',
                },
                series: [{
                    type: 'cylinder',
                    name: 'Revistas'
                }]
            }

            myarray = [];
            $.each(indexaciones_count, function(index, val) {
                myarray[index] = [val.nombre, val.revistas_count];
            });
            indexaciones_options.series[0].data = myarray;
            indexaciones_chart = new Highcharts.Chart(indexaciones_options);

        });
    </script>
@endsection