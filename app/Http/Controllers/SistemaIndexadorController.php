<?php

namespace App\Http\Controllers;

use App\Models\SistemaIndexador;
use Illuminate\Http\Request;

class SistemaIndexadorController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('sistemas-indexadores.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\SistemaIndexador  $sistemaIndexador
	 * @return \Illuminate\Http\Response
	 */
	public function show(SistemaIndexador $sistemaIndexador) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\SistemaIndexador  $sistemaIndexador
	 * @return \Illuminate\Http\Response
	 */
	public function edit(SistemaIndexador $sistemaIndexador) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\SistemaIndexador  $sistemaIndexador
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, SistemaIndexador $sistemaIndexador) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\SistemaIndexador  $sistemaIndexador
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(SistemaIndexador $sistemaIndexador) {
		//
	}
}
