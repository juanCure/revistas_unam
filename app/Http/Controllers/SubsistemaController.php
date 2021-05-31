<?php

namespace App\Http\Controllers;

use App\Models\Subsistema;
use App\Services\IndicesServicio;

class SubsistemaController extends Controller {

	public $indicesServicio;

	public function __construct(IndicesServicio $indicesServicio) {
		$this->indicesServicio = $indicesServicio;
		// Restringiendo a que rutas se puede acceder sin necesidad de estar logueado
		// Para este ejemplo particular se podrá acceder a index y show
		// $this->middleware('auth')->except(['index', 'show']);
		$this->middleware('auth')->except(['subsistemas']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('subsistemas.index');
	}

	/**
	 * Función para desplegar la lista de subistemas para la vista de usuario pública
	 * @return Array - un arrelgo de subsistema
	 */

	public function subsistemas() {
		$indices = $this->indicesServicio->getIndices();
		return view('subsistemas.public.index')->with([
			'subsistemas' => Subsistema::all(),
			'tipos_revistas' => $indices['typos'],
			'areas_conocimiento' => $indices['areas'],
			'indexadores' => $indices['indexadores'],
			'breadcrumb' => 'Subsistemas',
		]);
	}

}
