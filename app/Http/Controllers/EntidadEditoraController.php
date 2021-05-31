<?php

namespace App\Http\Controllers;

use App\Models\EntidadEditora;
use App\Services\IndicesServicio;

class EntidadEditoraController extends Controller {

	public $indicesServicio;

	public function __construct(IndicesServicio $indicesServicio) {
		$this->indicesServicio = $indicesServicio;
		// Restringiendo a que rutas se puede acceder sin necesidad de estar logueado
		// Para este ejemplo particular se podrá acceder a index y show
		// $this->middleware('auth')->except(['index', 'show']);
		$this->middleware('auth')->except(['entidades']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('entidad_editoras.index');
	}

	/**
	 * Función para desplegar la lista de entidades editoras
	 * @return Array - un arrelgo de subsistema
	 */

	public function entidades() {
		$indices = $this->indicesServicio->getIndices();
		return view('entidad_editoras.public.index')->with([
			'entidades' => EntidadEditora::orderBy('nombre', 'asc')->get(),
			'tipos_revistas' => $indices['typos'],
			'areas_conocimiento' => $indices['areas'],
			'indexadores' => $indices['indexadores'],
			'breadcrumb' => 'Entidades Académicas',
		]);
	}

}
