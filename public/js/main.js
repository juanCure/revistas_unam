
	

  $(function(){
$('<i class="typcn typcn-export"></i>').appendTo(
	'#modal_data a,.table_indicadores a, .article_link'

	);  


$('#indexaciones tspan').each(function(){
 $(this).remove();
});


$('.card_container text').each(function(){

 text = $(this);


if(text != undefined){

text.css({  
        'font-size': '15px',
        'font-family': 'Anaheim, sans-serif',
        //'font-weight': 'lighter',
        'line-height': '20px'
    });


$('text tspan').each(function(){

if($(this).attr('dy') == 14)
$(this).attr('dy', 20) 
console.log($(this).html())

})

}

})




/** ADVANCED SEARCH ***/

$('#advanced_search').on('click', function(){
	$(this).toggleClass('active')
})

for (var i = generateArrayOfYears().length - 1; i >= 0; i--) {
let	year = generateArrayOfYears()[i]
$('<option/>', {
	'value': year
}).html(year).appendTo('#year_col .advanced_select')

}

for (var i = allJournals.length - 1; i >= 0; i--) {
  
$('<option/>', {
	'value': 'journal_' + (i+1)
}).html(allJournals[i]).appendTo('#journal_select')

}

$('#year_col .advanced_select').on('change', function(){

	fixYearRange();

})


 
// el rango en las fechas de publicación seleccionadas no es válido


function fixYearRange(){
 
let from = $( "#select_from" ).val(); 
let to = $( "#select_to" ).val();


if(from > to){

$( "#select_from" ).val(to -1)

}else{
	//alert('lleno')
}

}

function generateArrayOfYears() {
  var max = new Date().getFullYear()
  var min = 1990
  var years = []

  for (var i = min; i <= max; i++) {
    years.push(i)
  }
  return years
}

})