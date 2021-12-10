@extends('layouts.app')
@section('content')
	@livewire('revistas.update', ['revista' => $revista])
@endsection