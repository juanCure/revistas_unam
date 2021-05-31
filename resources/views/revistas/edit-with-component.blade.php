@extends('layouts.app')
@section('content')
	<h1>Editando revistas</h1>
	@livewire('revistas.update', ['revista' => $revista])
@endsection