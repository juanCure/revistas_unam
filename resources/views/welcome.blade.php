@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Revistas UNAM</h1>
        <div class="row">
            @include('public_sidebar')
            <div class="col-md-8">
                <div class="panel panel-primary">
                    {{-- <div class="panel-heading">
                        <h3 class="panel-title">Laravel Donut HighChart Tutorial Example - NiceSnippets.com</h3>
                    </div> --}}
                    <div class="panel-body" align="center">
                        <div id="pie_typos_chart" style="width:500px; height:300px;">
                        </div>
                    </div>
                </div>
                <br>
                <div class="panel panel-primary">
                    {{-- <div class="panel-heading">
                        <h3 class="panel-title">Laravel Donut HighChart Tutorial Example - NiceSnippets.com</h3>
                    </div> --}}
                    <div class="panel-body" align="center">
                        <div id="pie_areas_chart" style="width:500px; height:300px;">
                        </div>
                    </div>
                </div>
                <br>
                <div class="panel panel-primary">
                    {{-- <div class="panel-heading">
                        <h3 class="panel-title">Laravel Donut HighChart Tutorial Example - NiceSnippets.com</h3>
                    </div> --}}
                    <div class="panel-body" align="center">
                        <div id="pie_indexaciones_chart" style="width:500px; height:500px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bibliotecas javascript y código para renderizar una gráfica Highcharts --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/cylinder.js"></script>
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
                    renderTo: 'pie_areas_chart',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                },
                title: {
                    text: 'Áreas de Conocimiento'
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