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
				@foreach ($subsistemas as $subsistema)
					<div class="row">
						<a href="{{ route('revistas.subsistema', ['subsistema_id' => $subsistema->id]) }}">{{ $subsistema->nombre }}</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection