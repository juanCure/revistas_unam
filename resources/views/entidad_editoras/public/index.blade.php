@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			@include('public_sidebar')
			<div class="col-md-8">
				<ol class="breadcrumb">
    				<li><a href="{{ route('inicio') }}">
    					<span>Inicio > </span>
    				</a></li>
    				<li> {{ $breadcrumb }}</li>
    			</ol>
				@foreach ($entidades as $entidad)
					<div class="row">
						<a href="{{ route('revistas.entidad', ['entidad_id' => $entidad->id]) }}">{{ $entidad->nombre }}</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection