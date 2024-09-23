<?php

namespace App\Http\Controllers;

use App\Exports\RevistasExport;
use App\Http\Requests\RevistaRequest;
use App\Models\Editorial;
use App\Models\Revista;
use App\Services\IndicesServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RevistaController extends Controller {

	public $indicesServicio;

	public function __construct(IndicesServicio $indicesServicio) {
		// Restringiendo a que rutas se puede acceder sin necesidad de estar logueado
		// Para este ejemplo particular se podrá acceder a index y show
		$this->middleware('auth')->except(['export']);
		// $this->middleware('auth');
		$this->indicesServicio = $indicesServicio;
	}

	public function index() {
		// $revistas = Revista::all();
		//dd($revistas);
		return view('revistas.index');
		// return view('revistas.index')->with([
		// 	'revistas' => $revistas,
		// ]);
	}

	public function create() {
		return view('revistas.create-with-component');
		/*return view('revistas.create')->with([
			'editoriales' => Editorial::all(),
			'subsistemas' => Subsistema::all(),
			'frecuencias' => Frecuencia::all(),
		]);*/
	}

	public function store(RevistaRequest $request) {
		//dd($request->all(), $request->validated());
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
		//dd(request()->all(), $request->all(), $request->validated());
		$revista = Revista::create($request->validated());
		$editoriales = $request->editoriales;
		foreach ($editoriales as $id_editorial) {
			$editorial = Editorial::findOrFail($id_editorial);
			//dump($editorial);
			//dump(key($editoriales) + 1);
			$revista->editoriales()->attach($editorial->id, ['orden' => key($editoriales) + 1]);
			next($editoriales);
		}
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
		return view('revistas.edit-with-component')
			->with([
				'revista' => $revista,
			]);
		// $editoriales = Editorial::all();
		// //$ids_selected_editoriales = $revista->editoriales->map->only(['id']);
		// $ids_selected_editoriales = collect([]);
		// foreach ($revista->editoriales as $editorial) {
		// 	$ids_selected_editoriales->push($editorial->id);
		// }
		// //dump($ids_selected_editoriales);
		// return view('revistas.edit')
		// 	->with([
		// 		'revista' => $revista,
		// 		'editoriales' => $editoriales,
		// 		'frecuencias' => Frecuencia::all(),
		// 		'subsistemas' => Subsistema::all(),
		// 		'ids_selected_editoriales' => $ids_selected_editoriales,
		// 	]);
	}

	public function update(RevistaRequest $request, Revista $revista) {

		//$revista = Revista::findOrFail($revista);
		//$revista->update(request()->all());
		$revista->update($request->validated());
		$revista->editoriales()->detach();
		$editoriales = $request->editoriales;
		foreach ($editoriales as $id_editorial) {
			$editorial = Editorial::findOrFail($id_editorial);
			$revista->editoriales()->attach($editorial->id, ['orden' => key($editoriales) + 1]);
			next($editoriales);
		}
		return redirect()
			->route('revistas.index')
			->with(['success' => "La revista con id {$revista->id_revista} fue editada con éxito"]);
	}

	public function destroy(Revista $revista) {
		$revista->editoriales()->detach();
		$revista->entidades_editoras()->detach();
		$revista->idiomas()->detach();
		$revista->temas()->detach();
		$revista->sistemas_indexadores()->detach();
		$revista->responsables()->detach();
		$revista->delete();
		return redirect()
			->route('revistas.index')
			->with(['success' => "La revista \"{$revista->titulo}\" fue borrada"]);
	}

	public function export(Request $request) {
		// Aquí debó llamar a la clase exportadora de revistas
		// return Excel::download(new RevistasExport, 'revistas.xlsx');
		//Log::info('Hi THERE! the name of the called route is: ' . $request->route()->getName());
		return (new RevistasExport($request, $this->indicesServicio))->download('revistas.xlsx');
	}
}
