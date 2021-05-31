<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller {

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
		return view('temas.index');
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
	 * @param  \App\Models\Tema  $tema
	 * @return \Illuminate\Http\Response
	 */
	public function show(Tema $tema) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Tema  $tema
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Tema $tema) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Tema  $tema
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Tema $tema) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Tema  $tema
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Tema $tema) {
		//
	}
}
