<?php

namespace App\Http\Controllers;

use App\Models\AreasConocimiento;
use Illuminate\Http\Request;

class AreasConocimientoController extends Controller {

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
		return view('areas_conocimiento.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//dd("Estoy en create");
		return view('areas_conocimiento.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$rules = [
			'nombre' => ['required', 'max:100'],
		];

		$area = AreasConocimiento::create($request->validate($rules));
		return redirect()
			->route('areas_conocimiento.index')
			->with(['success' => "Se ha creado una nueva area de conocimiento"]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\AreasConocimiento  $areasConocimiento
	 * @return \Illuminate\Http\Response
	 */
	public function show(AreasConocimiento $area) {
		dd("estoy en  show");
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\AreasConocimiento  $areasConocimiento
	 * @return \Illuminate\Http\Response
	 */
	public function edit(AreasConocimiento $areas_conocimiento) {
		//dd("estoy en  edit");
		return view('areas_conocimiento.edit')->with([
			'areas_conocimiento' => $areas_conocimiento,
		]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\AreasConocimiento  $areasConocimiento
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, AreasConocimiento $areas_conocimiento) {
		//dd("estoy en update");
		$rules = [
			'nombre' => ['required', 'max:100'],
		];

		$areas_conocimiento->update($request->validate($rules));
		return redirect()
			->route('areas_conocimiento.index')
			->with(['success' => "La actualización se realizó exitósamente"]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\AreasConocimiento  $areasConocimiento
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(AreasConocimiento $areas_conocimiento) {
		$areas_conocimiento->delete();

		return redirect()
			->route('areas_conocimiento.index')
			->with(['success' => "La área de conocimiento con nombre \"{$areas_conocimiento->nombre}\" fue eliminada"]);
	}
}
