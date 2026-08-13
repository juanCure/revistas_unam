const tipos = {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45,
            beta: 0
        }
    },
    title: {
        text: ''
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    tooltip: {
        pointFormat: '{series.name}: <span>{point.percentage:.1f}%</span>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth: 35,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Browser share',
        data: [{
            name: 'Cultural',
            y: 61.41,
        
        }, {
            name: 'Técnico-profesional',
            y: 11.84
        }, {
            name: 'Divulgación',
            y: 10.85
        }, {
            name: 'Investigación',
            y: 4.67
        }]
    }]
}


const areas =  {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 45
        }
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        pie: {
            innerSize: 100,
            depth: 45
        }
    },
    series: [{
        name: 'Delivered amount',
        data: [
            ['Artes <br>y Humanidades', 8],
            ['Biología<br> y Química', 3],
            ['Biotecnología <br>y Ciencias<br>Agropecuarias', 1],
            ['Ciencias Sociales <br>y Económicas', 6],
            ['Físico Matemáticas y Ciecias <br>de la Tierra', 8],
            ['Ingenierías', 4],
            ['Medicina <br>y Ciencias de la Salud', 4],
            ['Multidisciplina (bag)', 1],
        
        ],

             card_data: [
            ['Artes y Humanidades', 8],
            ['Biología y Química', 3],
            ['Biotecnología y Ciencias Agropecuarias', 1],
            ['Ciencias Sociales y Económicas', 6],
            ['Físico Matemáticas y Ciecias de la Tierra', 8],
            ['Ingenierías', 4],
            ['Medicina y Ciencias de la Salud', 4],
            ['Multidisciplina (bag)', 1],
        
        ]
    }]
}




const indexaciones = {
    chart: {
        renderTo: 'container',
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    plotOptions: {
        column: {
            depth: 25
        }
    },
      xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Population (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Population in 2017: <span>{point.y:.1f} millions</span>'
    },
    series: [{
        name: '', 
        data: [
                 ['SCOPUS', 24.2],
            ['WoS', 20.8],
            ['ScieLO Citation Index', 14.9],
            ['ScieLO', 13.7],
            ['Latindex Catálogo', 13.1],
            ['Conacyt', 12.7],
            ['RedALyC', 12.4],
            ['DOAJ', 12.2],
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'sans-serif'
            }
        }
    }]
}

/****** VACIADO DE DATA *****/



document.addEventListener('DOMContentLoaded', function () {
        const _tipos = Highcharts.chart('tipos', tipos);
        const _areas = Highcharts.chart('areas', areas);
        const _indexaciones = Highcharts.chart('indexaciones', indexaciones);
    });


    /****charts***/

 const tiposData = tipos.series[0].data;
 const tipos_list = $('#tipos_list')
 const areasData = areas.series[0].card_data;
 const areas_list = $('#areas_list')
 const indexacionesData = indexaciones.series[0].data;
 const indexaciones_list = $('#indexaciones_list')


 
for(var i = 0; i < tiposData.length; i++){

//tipos_list

$('<li class="list-group-item"><a href="#">' +tiposData[i].name +'</a></li>').appendTo(tipos_list)

}

for(var i = 0; i < areasData.length; i++){

//areas_list

$('<li class="list-group-item"><a href="#">' +areasData[i][0] +'</a></li>').appendTo(areas_list)

}

for(var i = 0; i < indexacionesData.length; i++){

//indexaciones_list

$('<li class="list-group-item"><a href="#">' +indexacionesData[i][0] +'</a></li>').appendTo(indexaciones_list)

}


$('#card_tipos .list-group-item').eq(1).addClass('selected_item');

$('.card .list-group-item a').each(function(){
 let html = $(this).html();

 $(this).html('<i class="fa fa-chevron-right"></i>' + html)

});

