@extends('layouts.app')
{{-- @section('content')
	<div class="container">
	    <div class="row">
	        <h1>Resumen de la revista</h1>
	    	<div class="container">
	    		<div class="row">
	    			<div class="col-md-12">
	    				<h3>{{ $revista->titulo }}</h3>
	    			</div>
	    		</div>
			@include('revistas.ficha')
	    </div>
	</div>
@endsection --}}
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Resumen de la revista</h1>
				<h3>{{ $revista->titulo }}</h3>
				@include('revistas.ficha')
			</div>
		</div>
	</div>
@endsection