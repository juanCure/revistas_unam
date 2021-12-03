@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
		@include("resultados.bSolrIndex")
	</div>
	<script>

		function doSomething(element){
			console.log("Estoy en el script de busqueda avanzada");
		}
	</script>
@endsection