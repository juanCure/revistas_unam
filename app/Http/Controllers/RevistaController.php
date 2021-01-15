<?php

namespace App\Http\Controllers;

use App\Http\Requests\RevistaRequest;
use App\Models\Revista;

class RevistaController extends Controller {

	public function index() {
		$revistas = Revista::all();
		//dd($revistas);
		return view('revistas.index')->with([
			'revistas' => $revistas,
		]);
	}

	public function create() {
		return view('revistas.create');
	}

	public function store(RevistaRequest $request) {
		//dd('Estamos en store');
		/*$revista = Revista::create([
			'titulo' => request()->titulo,
			'descripcion' => request()->descripcion,
			'anio_inicio' => request()->anio_inicio,
			'issn' => request()->issn,
			'issne' => request()->issne,
			'arbitrada' => request()->arbitrada,
			'situacion' => request()->situacion,
			'id_frecuencia' => request()->id_frecuencia,
			'id_soporte' => request()->id_soporte,
			'id_tipo_revista' => request()->id_tipo_revista,
			'id_area_conocimiento' => request()->id_area_conocimiento,
			'id_subsistema' => request()->id_subsistema,
			'otros_indices' => request()->otros_indices,
			'editorial' => request()->editorial,
		]);*/
		//$revista = Revista::create(request()->all());
		$revista = Revista::create($request->validated());

		return redirect()
			->route('revistas.index')
			->with(['success' => "La nueva revista with id {$revista->id_revista} fue creada"]);
	}

	public function show(Revista $revista) {

		//$revista = Revista::where("id_revista", $revista);
		//$id_revista = 1;
		//$revista = Revista::findOrFail($revista);
		//dd($revista);
		return view('revistas.show')->with([
			'revista' => $revista,
		]);
	}

	public function edit(Revista $revista) {
		return view('revistas.edit')
			->with([
				'revista' => $revista,
			]);

	}

	public function update(RevistaRequest $request, Revista $revista) {

		//$revista = Revista::findOrFail($revista);
		//$revista->update(request()->all());
		$revista->update($request->validated());
		return redirect()
			->route('revistas.index')
			->with(['success' => "La revista con id {$revista->id_revista} fue editada con éxito"]);
	}

	public function destroy($revista) {
		$revista = Revista::findOrFail($revista);

		$revista->delete();

		return redirect()
			->route('revistas.index')
			->with(['success' => "La revista con id {$revista->id_revista} fue borrada"]);
	}
}
