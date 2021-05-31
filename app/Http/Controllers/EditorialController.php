<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller {

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
		//$editoriales = Editorial::all();
		return view('editoriales.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		dd('Estoy en create');
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
	 * @param  \App\Models\Editorial  $editorial
	 * @return \Illuminate\Http\Response
	 */
	public function show(Editorial $editorial) {
		dd('Estoy en show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Editorial  $editorial
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Editorial $editorial) {
		dd('Estoy en edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Editorial  $editorial
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Editorial $editorial) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Editorial  $editorial
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Editorial $editorial) {
		dd('Estoy en destroy');
	}
}
