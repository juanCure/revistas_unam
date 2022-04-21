@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
		@include("resultados.bSolrIndex")
	</div>
	<script>

		// Obteniendo la URL DE LA APP
		var APP_URL = {!! json_encode(url('/')) !!};
		var requested_journal = @json($requested_journal);
		var selected_publish_date_from_controller = @json($selected_publishDates, JSON_HEX_TAG);
		var selected_journals_from_controller = @json($selected_journals, JSON_HEX_TAG);
		var author_name = @json($author_name);
		var myownSearchTerm = @json($searchTerm);

		// Arrays to store the selected publish dates and the selected journal from checkboxes
		var selected_publish_date = [], selected_journals = [];
		if(selected_publish_date_from_controller) {
			selected_publish_date = selected_publish_date_from_controller;
		}
		if(selected_journals_from_controller) {
			selected_journals = selected_journals_from_controller;
		}


		function doSomething(element){
			var checkbox_id = element.id;
			var checkbox_name = element.name;
			var checkbox_value = element.value;
			var searchText = @json($searchTerm);


			var pub_date_checkbox = element.value;
			// console.log("checkbox value: ", pub_date_checkbox);
			// console.log(selected_publish_date);
			// var searchText = $('#searchText').html();
		    // console.log("searchText es: ", searchText);
			if(element.checked) {
				if(checkbox_name == "pub_date") {
					selected_publish_date.push(checkbox_value);
					console.log("this is selected publish dates: ", selected_publish_date);
				}
				if(checkbox_name == "journals") {
					selected_journals.push(checkbox_value);
					console.log(selected_journals);
				}
			    $.ajax({
			    	headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
			        type: "POST",
			        url: APP_URL + "/avanzada",
			        async: true,
			        data: {
			        	'selected_publishDates': selected_publish_date,
			        	'selected_journals': selected_journals,
			        	'requested_journal': requested_journal,
			        	'author_name': author_name,
			        },
			        success: function(data) {
			        	console.log("It works!");
			        	$('#main_container').html(data);
			        	// $('#' + checkbox_id).attr('checked', true);
			        },
			        error: function() {
			        	console.log("It brokes!")
			        }
			    });
			} else {
				if(checkbox_name == "pub_date") {
					var index = selected_publish_date.indexOf(element.value);
					if(index !== -1) {
						selected_publish_date.splice(index, 1);
					}
				}
				if(checkbox_name == "journals") {
					var index = selected_journals.indexOf(element.value);
					if(index !== -1) {
						selected_journals.splice(index, 1);
					}
				}
				console.log("notchecked! \n Removing: ", element.value);

				$.ajax({
			    	headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
					},
			        type: "POST",
			        url: APP_URL + "/avanzada",
			        async: true,
			        data: {
			        	'selected_publishDates': selected_publish_date,
			        	'selected_journals': selected_journals,
			        	'requested_journal': requested_journal,
			        	'author_name': author_name,
			        },
			        success: function(data) {
			        	console.log("It works!");
			        	$('#main_container').html(data);
			        	// $('#' + checkbox_id).attr('checked', true);
			        },
			        error: function() {
			        	console.log("It brokes!")
			        }
			    });
			}
		}
	</script>
@endsection