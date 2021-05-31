<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller {

	public function __construct() {
		// Restringiendo a que rutas se puede acceder sin necesidad de estar logueado
		// Para este ejemplo particular se podrá acceder a index y show
		// $this->middleware('auth')->except(['index', 'show']);
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		dd(Responsable::all());
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
	 * @param  \App\Models\Responsable  $responsable
	 * @return \Illuminate\Http\Response
	 */
	public function show(Responsable $responsable) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Responsable  $responsable
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Responsable $responsable) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Responsable  $responsable
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Responsable $responsable) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Responsable  $responsable
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Responsable $responsable) {
		//
	}
}
