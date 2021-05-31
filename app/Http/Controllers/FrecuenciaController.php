<?php

namespace App\Http\Controllers;

use App\Models\Frecuencia;

class FrecuenciaController extends Controller {

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
		return view('frecuencias.index')
			->with(['frecuencias' => Frecuencia::all()]);
	}
}
