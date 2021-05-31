<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller {

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
		return view('idiomas.index');
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
	 * @param  \App\Models\Idioma  $idioma
	 * @return \Illuminate\Http\Response
	 */
	public function show(Idioma $idioma) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Idioma  $idioma
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Idioma $idioma) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Idioma  $idioma
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Idioma $idioma) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Idioma  $idioma
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Idioma $idioma) {
		//
	}
}
