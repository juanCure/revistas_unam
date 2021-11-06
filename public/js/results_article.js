$('.link_description').each(function(i){

let id_num = i + 1;


$(this).attr('href', '#' + 'description_container_'  + id_num )
$(this).next('.description_container').attr('id', 'description_container_'  +id_num);

	//description_container 
})