<?php

namespace App\Http\Controllers;

use App\Models\AreasConocimiento;
use App\Models\EntidadEditora;
use App\Models\Revista;
use App\Models\SistemaIndexador;
use App\Models\Subsistema;
use App\Services\IndicesServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedaPorIndiceController extends Controller {

	public $indicesServicio;

	public function __construct(IndicesServicio $indicesServicio) {
		$this->indicesServicio = $indicesServicio;
	}

	// Función para filtrar las revistas por tipo de revista
	//
	public function getRevistasPorTipo(Request $request) {
		$indices = $this->indicesServicio->getIndices();
		$alfabeto = $this->indicesServicio->getAlfabeto();
		$tipo = $request->tipo;
		$letra = $request->abc;
		$per_page = $request->per_page ?? 20;
		$arbitrada = $request->arbitrada;
		$soporte = $request->soporte;
		$sort = $request->sort;

		$revistas = Revista::vigente()
		->when($tipo, function ($query, $tipo) {
			return $query->where('tipo_revista', $tipo);
		})->when($letra, function ($query, $letra) {
			return $query->where('titulo', 'like', "{$letra}%");
		})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->when($sort, function ($query, $sort){
			return $query->reorder()->sortable();
		})->paginate($per_page)->withQueryString();

		if (!$request->ajax()) {
			// dump("It's not ajax request");
			return view('resultados.resultadosPorIndices', [
				'revistas' => $revistas,
				'tipos_revistas' => $indices['typos'],
				'areas_conocimiento' => $indices['areas'],
				'indexadores' => $indices['indexadores'],
				'alfabeto' => $alfabeto,
				'accion' => $request->path(),
				'filtro' => $tipo,
				'breadcrumb' => $tipo,
			]);
		}

		return view('resultados.index')->with([
			'revistas' => $revistas,
		])->render();

	}

	// Función para filtrar las revistas por area de conocimiento
	//
	public function getRevistasPorArea(Request $request) {
		$indices = $this->indicesServicio->getIndices();
		$alfabeto = $this->indicesServicio->getAlfabeto();
		$area_id = $request->area_id;
		$letra = $request->abc;
		$per_page = $request->per_page ?? 20;
		$arbitrada = $request->arbitrada;
		$soporte = $request->soporte;
		$sort = $request->sort;

		$revistas = Revista::vigente()
		->when($area_id, function ($query, $area_id) {
			return $query->where('id_area_conocimiento', $area_id);
		})->when($letra, function ($query, $letra) {
			return $query->where('titulo', 'like', "{$letra}%");
		})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->when($sort, function ($query, $sort){
			return $query->reorder()->sortable();
		})->paginate($per_page)->withQueryString();

		if (!$request->ajax()) {
			// dump("It's not ajax request");
			return view('resultados.resultadosPorIndices', [
				'revistas' => $revistas,
				'tipos_revistas' => $indices['typos'],
				'areas_conocimiento' => $indices['areas'],
				'indexadores' => $indices['indexadores'],
				'alfabeto' => $alfabeto,
				'accion' => $request->path(),
				'filtro' => $area_id,
				'breadcrumb' => AreasConocimiento::find($area_id)->nombre,
			]);
		}

		return view('resultados.index')->with([
			'revistas' => $revistas,
		])->render();
	}

	// Función para filtrar las revistas por sistema indexador
	//
	public function getRevistasPorIndexaciones(Request $request) {
		$indices = $this->indicesServicio->getIndices();
		$alfabeto = $this->indicesServicio->getAlfabeto();
		$indice_id = $request->indice_id;
		$letra = $request->abc;
		$per_page = $request->per_page ?? 20;
		$arbitrada = $request->arbitrada;
		$soporte = $request->soporte;
		$sort = $request->sort;

		$revistas = SistemaIndexador::find($indice_id)
			->revistas()
			->vigente()
			->when($letra, function ($query, $letra) {
				return $query->where('titulo', 'like', "{$letra}%");
			})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->when($sort, function ($query, $sort){
			return $query->reorder()->sortable();
		})->paginate($per_page)->withQueryString();

		if (!$request->ajax()) {
			return view('resultados.resultadosPorIndices', [
				'revistas' => $revistas,
				'tipos_revistas' => $indices['typos'],
				'areas_conocimiento' => $indices['areas'],
				'indexadores' => $indices['indexadores'],
				'alfabeto' => $alfabeto,
				'accion' => $request->path(),
				'filtro' => $indice_id,
				'breadcrumb' => SistemaIndexador::find($indice_id)->nombre,
			]);
		}

		return view('resultados.index')->with([
			'revistas' => $revistas,
		])->render();

	}

	public function getRevistasPorEntidadEditora(Request $request) {
		$indices = $this->indicesServicio->getIndices();
		$alfabeto = $this->indicesServicio->getAlfabeto();
		$entidad_id = $request->entidad_id;
		$letra = $request->abc;
		$per_page = $request->per_page ?? 20;
		$arbitrada = $request->arbitrada;
		$soporte = $request->soporte;
		$sort = $request->sort;

		$revistas = EntidadEditora::find($entidad_id)->revistas()->vigente()
		->when($letra, function ($query, $letra) {
				return $query->where('titulo', 'like', "{$letra}%");
		})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->when($sort, function ($query, $sort){
			return $query->reorder()->sortable();
		})->paginate(20)->withQueryString();

		if (!$request->ajax()) {
			return view('resultados.resultadosPorIndices', [
				'revistas' => $revistas,
				'tipos_revistas' => $indices['typos'],
				'areas_conocimiento' => $indices['areas'],
				'indexadores' => $indices['indexadores'],
				'alfabeto' => $alfabeto,
				'accion' => $request->path(),
				'filtro' => $entidad_id,
				'breadcrumb' => ' Entidades Académicas > ' . EntidadEditora::find($entidad_id)->nombre,
			]);
		}

		return view('resultados.index')->with([
			'revistas' => $revistas,
		])->render();

	}

	// Función para filtrar las revistas por area de conocimiento
	//
	public function getRevistasPorSubsistema(Request $request) {
		$indices = $this->indicesServicio->getIndices();
		$alfabeto = $this->indicesServicio->getAlfabeto();
		$subsistema_id = $request->subsistema_id;
		$letra = $request->abc;
		$per_page = $request->per_page ?? 20;
		$arbitrada = $request->arbitrada;
		$soporte = $request->soporte;
		$sort = $request->sort;

		$revistas = Revista::vigente()
		->when($subsistema_id, function ($query, $subsistema_id) {
			return $query->where('id_subsistema', $subsistema_id);
		})->when($letra, function ($query, $letra) {
			return $query->where('titulo', 'like', "{$letra}%");
		})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->when($sort, function ($query, $sort){
			return $query->reorder()->sortable();
		})->paginate($per_page)->withQueryString();

		if (!$request->ajax()) {
			return view('resultados.resultadosPorIndices', [
				'revistas' => $revistas,
				'tipos_revistas' => $indices['typos'],
				'areas_conocimiento' => $indices['areas'],
				'indexadores' => $indices['indexadores'],
				'alfabeto' => $alfabeto,
				'accion' => $request->path(),
				'filtro' => $subsistema_id,
				'breadcrumb' => ' Subsistemas > ' . Subsistema::find($subsistema_id)->nombre,
			]);
		}

		return view('resultados.index')->with([
			'revistas' => $revistas,
		])->render();
	}

	public function viewModal($revista_id) {

		$revista = Revista::findOrFail($revista_id);
		return response()->json([
			'body' => view('revistas.ficha', compact('revista'))->render(),
			'title' => $revista->titulo,
			'url' => $revista->ojs_ruta,
		]);
	}

	public function getTodosTiposRevistas(Request $request) {
		$indices = $this->indicesServicio->getIndices();
		$alfabeto = $this->indicesServicio->getAlfabeto();
		$letra = $request->abc;
		$per_page = $request->per_page ?? 20;
		$arbitrada = $request->arbitrada;
		$soporte = $request->soporte;
		$sort = $request->sort;

		$revistas = Revista::vigente()
		->when($letra, function ($query, $letra) {
			$query->where('titulo', 'like', "{$letra}%");
		})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->when($sort, function ($query, $sort){
			return $query->reorder()->sortable();
		})->paginate($per_page)->withQueryString();

		if (!$request->ajax()) {
			return view('resultados.resultadosPorIndices', [
				'revistas' => $revistas,
				'tipos_revistas' => $indices['typos'],
				'areas_conocimiento' => $indices['areas'],
				'indexadores' => $indices['indexadores'],
				'alfabeto' => $alfabeto,
				'accion' => 'allRevistas',
				'filtro' => '',
				'breadcrumb' => "Todos los tipos",
			]);
		}

		return view('resultados.index')->with([
			'revistas' => $revistas,
		])->render();
	}

	public function getTodosTitulos(Request $request) {
		$indices = $this->indicesServicio->getIndices();
		$alfabeto = $this->indicesServicio->getAlfabeto();
		$letra = $request->abc;
		$per_page = $request->per_page ?? 20;
		$arbitrada = $request->arbitrada;
		$soporte = $request->soporte;
		$sort = $request->sort;

		$revistas = Revista::vigente()->when($letra, function ($query, $letra) {
			$query->where('titulo', 'like', "{$letra}%");
		})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->when($sort, function ($query, $sort){
			return $query->reorder()->sortable();
		})->paginate($per_page)->withQueryString();

		if (!$request->ajax()) {
			return view('resultados.resultadosPorIndices', [
				'revistas' => $revistas,
				'tipos_revistas' => $indices['typos'],
				'areas_conocimiento' => $indices['areas'],
				'indexadores' => $indices['indexadores'],
				'alfabeto' => $alfabeto,
				'accion' => 'allRevistas',
				'filtro' => '',
				'breadcrumb' => "Todos los títulos",
			]);
		}

		return view('resultados.index')->with([
			'revistas' => $revistas,
		])->render();
	}

	public function getRevistasDescontinuadas(Request $request) {
		$indices = $this->indicesServicio->getIndices();
		$alfabeto = $this->indicesServicio->getAlfabeto();
		$letra = $request->abc;
		$per_page = $request->per_page ?? 20;
		$arbitrada = $request->arbitrada;
		$soporte = $request->soporte;
		$sort = $request->sort;

		$revistas = Revista::where('situacion', 'Descontinuada')->orderBy('titulo', 'asc')
		->when($letra, function ($query, $letra) {
			return $query->where('titulo', 'like', "{$letra}%");
		})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->when($sort, function ($query, $sort){
			return $query->reorder()->sortable();
		})->paginate($per_page)->withQueryString();

		if (!$request->ajax()) {
			return view('resultados.resultadosPorIndices', [
				'revistas' => $revistas,
				'tipos_revistas' => $indices['typos'],
				'areas_conocimiento' => $indices['areas'],
				'indexadores' => $indices['indexadores'],
				'alfabeto' => $alfabeto,
				'accion' => 'oldRevistas',
				'filtro' => 'Descontinuada',
				'breadcrumb' => "Revistas Descontinuadas",
			]);
		}

		return view('resultados.index')->with([
			'revistas' => $revistas,
		])->render();
	}

	public function postListadoRevistas(Request $request) {
		// $data = $request->all();
		// dump($request->per_page);
		$tipo_revista = $request->tipo;
		$area_conocimiento = $request->area_id;
		$indezacion = $request->indice_id;
		$per_page = $request->per_page;
		$entidad = $request->entidad_id;
		$subsistema_id = $request->subsistema_id;
		$oldRevistas = $request->oldRevistas;
		if ($tipo_revista) {
			// dump("postListadoRevistas - tipo_revista");
			return $this->getRevistasPorTipo($request);

		} elseif ($area_conocimiento) {
			return $this->getRevistasPorArea($request);
		} elseif ($indezacion) {
			return $this->getRevistasPorIndexaciones($request);
		} elseif ($entidad) {
			return $this->getRevistasPorEntidadEditora($request);
		} elseif ($subsistema_id) {
			return $this->getRevistasPorSubsistema($request);
		} elseif ($oldRevistas) {
			return $this->getRevistasDescontinuadas($request);
		} else {
			// return response()->json([
			// 	'success' => 'Ajax request submitted successfully',
			// 	'tipo_revista' => $request->tipo_revista,
			// 	'area_id' => $request->area_conocimiento,
			// 	'indice_id' => $request->indezacion,
			// 	'per_page' => $request->per_page,
			// 	'arbitrada' => $request->arbitrada,
			// 	'soporte' => $request->soporte]);
			return $this->getTodosTiposRevistas($request);
		}
	}

	/**
	 * [getIndicador Método para obtener el atributo indicador del modelo Revista]
	 * @param  $revista_id
	 * @return indicador
	 */
	public function getIndicador($revista_id) {
		return response()->json([
			'indicador' => Revista::findOrFail($revista_id)->indicador,
		]);
	}

	/**
	 * Función para generar los totales que se cargaran en una Highchart en una vista modal
	 */
	public function getTotales(Request $request) {

		/*
			<option value="" selected="selected">Seleccione...</option>
			<option value="1">Áreas del conocimiento</option>
			<option value="2">Entidades académicas</option>
			<option value="7">Indexaciones</option>
			<option value="3">Subsistemas</option>
			<option value="6">Tipos de revista</option>
		*/
		$filter_id = $request->grafica;
		$tipo = $request->tipo;
		$area_id = $request->area_id;
		$indice_id = $request->indice_id;
		$entidad_id = $request->entidad_id;
		$subsistema_id = $request->subsistema_id;
		$old_revistas = $request->oldRevistas;
		$data;
		$respuesta;
		switch ($filter_id) {
		case 1:
			$indice = "Areas del conocimiento";
			$data = $this->agruparRevistasPorArea($tipo, $area_id, $indice_id, $entidad_id, $subsistema_id, $old_revistas);
			$respuesta = [
				'indice' => $indice,
				'data' => $data,
				'titulo' => "Número de revistas por area de conocimiento",
			];
			break;
		case 2:
			$indice = "Entidades Académicas";
			$data = $this->agruparRevistasPorEntidades($tipo, $area_id, $indice_id, $entidad_id, $subsistema_id, $old_revistas);
			$respuesta = [
				'indice' => $indice,
				'data' => $data,
				'titulo' => "Número de revistas por entidades académicas",
			];
			break;
		case 3:
			$indice = "Subsistemas";
			$data = $this->agruparRevistasPorSubsistemas($tipo, $area_id, $indice_id, $entidad_id, $subsistema_id, $old_revistas);
			$respuesta = [
				'indice' => $indice,
				'data' => $data,
				'titulo' => "Número de revistas por subsistemas",
			];
			break;
		case 6:
			$indice = "Tipos de revista";
			$data = $this->agruparRevistasPorTipo($tipo, $area_id, $indice_id, $entidad_id, $subsistema_id, $old_revistas);
			$respuesta = [
				'indice' => $indice,
				'data' => $data,
				'titulo' => "Número de revistas por tipo",
			];
			break;
		case 7:
			$indice = "Indexaciones";
			$data = $this->agruparRevistasPorIndices($tipo, $area_id, $indice_id, $entidad_id, $subsistema_id, $old_revistas);
			$respuesta = [
				'indice' => $indice,
				'data' => $data,
				'titulo' => "Número de revistas por indices",
			];
			break;

		}
		return response()->json($respuesta);
	}

	public function agruparRevistasPorTipo($tipo, $area_id, $indice_id, $entidad_id, $subsistema_id, $old_revistas) {

		if (isset($tipo) || isset($area_id) || $subsistema_id) {
			$totales = Revista::vigente()->select(\DB::raw("tipo_revista as name, COUNT(*) as y"))
				->when($tipo, function ($query, $tipo) {
					return $query->where('tipo_revista', $tipo);
				})
				->when($area_id, function ($query, $area_id) {
					return $query->where('id_area_conocimiento', $area_id);
				})
				->when($subsistema_id, function ($query, $subsistema_id) {
					return $query->where('id_subsistema', $subsistema_id);
				})
				->groupBy(\DB::raw("tipo_revista"))
				->get();
		} elseif (isset($entidad_id)) {
			$totales = DB::table('revistas')
				->join('entidad_editoras_revistas', 'entidad_editoras_revistas.id_revista', '=', 'revistas.id_revista')
				->join('entidad_editoras', 'entidad_editoras.id', '=', 'entidad_editoras_revistas.id_entidad_editora')
				->where('entidad_editoras.id', $entidad_id)
				->select('revistas.tipo_revista as name', DB::raw('count(*) as y'))
				->groupBy(DB::raw('revistas.tipo_revista'))
				->get();
		} elseif (isset($indice_id)) {
			$totales = DB::table('revistas')
				->join('indezadores_revistas', 'indezadores_revistas.id_revista', '=', 'revistas.id_revista')
				->join('sistemas_indexadores', 'sistemas_indexadores.id', '=', 'indezadores_revistas.id_sistema')
				->where('sistemas_indexadores.id', $indice_id)
				->select('revistas.tipo_revista as name', DB::raw('count(*) as y'))
				->groupBy(DB::raw('revistas.tipo_revista'))
				->get();
		} elseif (isset($old_revistas)) {
			$totales = Revista::select(DB::raw("tipo_revista as name, COUNT(*) as y"))
				->where('situacion', "Descontinuada")
				->groupBy(DB::raw("tipo_revista"))
				->get();
		} else {
			$totales = Revista::vigente()->select(DB::raw("tipo_revista as name, COUNT(*) as y"))
				->groupBy(DB::raw("tipo_revista"))
				->get();
		}

		return $totales;
	}

	public function agruparRevistasPorArea($tipo, $area_id, $indice_id, $entidad_id, $subsistema_id, $old_revistas) {

		if (isset($tipo) || isset($area_id) || $subsistema_id) {

			$totales = DB::table('revistas')
				->join('areas_conocimiento', 'areas_conocimiento.id', '=', 'revistas.id_area_conocimiento')
				->when($tipo, function ($query, $tipo) {
					return $query->where('revistas.tipo_revista', $tipo);
				})
				->when($area_id, function ($query, $area_id) {
					return $query->where('revistas.id_area_conocimiento', $area_id);
				})
				->when($subsistema_id, function ($query, $subsistema_id) {
					return $query->where('revistas.id_subsistema', $subsistema_id);
				})
				->select('areas_conocimiento.nombre as name', DB::raw('count(*) as y'))
				->groupBy('areas_conocimiento.nombre')
				->get();
		} elseif (isset($entidad_id)) {
			$totales = DB::table('revistas')
				->join('areas_conocimiento', 'areas_conocimiento.id', '=', 'revistas.id_area_conocimiento')
				->join('entidad_editoras_revistas', 'entidad_editoras_revistas.id_revista', '=', 'revistas.id_revista')
				->join('entidad_editoras', 'entidad_editoras.id', '=', 'entidad_editoras_revistas.id_entidad_editora')
				->where('entidad_editoras.id', $entidad_id)
				->select('areas_conocimiento.nombre as name', DB::raw('count(*) as y'))
				->groupBy(DB::raw('areas_conocimiento.nombre'))
				->get();
		} elseif (isset($indice_id)) {
			$totales = DB::table('revistas')
				->join('areas_conocimiento', 'areas_conocimiento.id', '=', 'revistas.id_area_conocimiento')
				->join('indezadores_revistas', 'indezadores_revistas.id_revista', '=', 'revistas.id_revista')
				->join('sistemas_indexadores', 'sistemas_indexadores.id', '=', 'indezadores_revistas.id_sistema')
				->where('sistemas_indexadores.id', $indice_id)
				->select('areas_conocimiento.nombre as name', DB::raw('count(*) as y'))
				->groupBy(DB::raw('areas_conocimiento.nombre'))
				->get();

		} elseif (isset($old_revistas)) {
			$totales = DB::table('revistas')
				->join('areas_conocimiento', 'areas_conocimiento.id', '=', 'revistas.id_area_conocimiento')
				->where('revistas.situacion', 'Descontinuada')
				->select('areas_conocimiento.nombre as name', DB::raw('count(*) as y'))
				->groupBy(DB::raw('areas_conocimiento.nombre'))
				->get();
		} else {
			$totales = Revista::vigente()->select(DB::raw("areas_conocimiento.nombre as name, COUNT(*) as y"))
				->join('areas_conocimiento', 'areas_conocimiento.id', '=', 'revistas.id_area_conocimiento')
				->groupBy(DB::raw('areas_conocimiento.nombre'))
				->get();
		}

		return $totales;
	}

	public function agruparRevistasPorEntidades($tipo, $area_id, $indice_id, $entidad_id, $subsistema_id, $old_revistas) {
		$totales;
		if (isset($tipo) || isset($area_id) || $subsistema_id) {

			$totales = DB::table('revistas')
				->join('entidad_editoras_revistas', 'entidad_editoras_revistas.id_revista', '=', 'revistas.id_revista')
				->join('entidad_editoras', 'entidad_editoras.id', '=', 'entidad_editoras_revistas.id_entidad_editora')
				->when($tipo, function ($query, $tipo) {
					return $query->where('revistas.tipo_revista', $tipo);
				})
				->when($area_id, function ($query, $area_id) {
					return $query->where('revistas.id_area_conocimiento', $area_id);
				})
				->when($subsistema_id, function ($query, $subsistema_id) {
					return $query->where('revistas.id_subsistema', $subsistema_id);
				})
				->select('entidad_editoras.nombre as name', DB::raw('count(*) as y'))
				->groupBy('entidad_editoras.nombre')
				->get();
		} elseif (isset($entidad_id)) {
			$totales = DB::table('revistas')
				->join('entidad_editoras_revistas', 'entidad_editoras_revistas.id_revista', '=', 'revistas.id_revista')
				->join('entidad_editoras', 'entidad_editoras.id', '=', 'entidad_editoras_revistas.id_entidad_editora')
				->where('entidad_editoras.id', $entidad_id)
				->select('entidad_editoras.nombre as name', DB::raw('count(*) as y'))
				->groupBy(DB::raw('entidad_editoras.nombre'))
				->get();
		} elseif (isset($indice_id)) {
			$totales = DB::table('revistas')
				->join('entidad_editoras_revistas', 'entidad_editoras_revistas.id_revista', '=', 'revistas.id_revista')
				->join('entidad_editoras', 'entidad_editoras.id', '=', 'entidad_editoras_revistas.id_entidad_editora')
				->join('indezadores_revistas', 'indezadores_revistas.id_revista', '=', 'revistas.id_revista')
				->join('sistemas_indexadores', 'sistemas_indexadores.id', '=', 'indezadores_revistas.id_sistema')
				->where('sistemas_indexadores.id', $indice_id)
				->select('entidad_editoras.nombre as name', DB::raw('count(*) as y'))
				->groupBy(DB::raw('entidad_editoras.nombre'))
				->orderBy('entidad_editoras.nombre', 'asc')
				->get();

		} elseif (isset($old_revistas)) {
			$totales = DB::table('revistas')
				->join('entidad_editoras_revistas', 'entidad_editoras_revistas.id_revista', '=', 'revistas.id_revista')
				->join('entidad_editoras', 'entidad_editoras.id', '=', 'entidad_editoras_revistas.id_entidad_editora')
				->where('revistas.situacion', 'Descontinuada')
				->select('entidad_editoras.nombre as name', DB::raw('count(*) as y'))
				->groupBy(DB::raw('entidad_editoras.nombre'))
				->get();
		} else {
			$totales = Revista::select(DB::raw("entidad_editoras.nombre as name, COUNT(*) as y"))
				->join('entidad_editoras_revistas', 'entidad_editoras_revistas.id_revista', '=', 'revistas.id_revista')
				->join('entidad_editoras', 'entidad_editoras.id', '=', 'entidad_editoras_revistas.id_entidad_editora')
				->groupBy(DB::raw('entidad_editoras.nombre'))
				->get();
		}

		return $totales;
	}

	public function agruparRevistasPorIndices($tipo, $area_id, $indice_id, $entidad_id, $subsistema_id, $old_revistas) {
		$totales;
		if (isset($tipo) || isset($area_id) || $subsistema_id) {

			$totales = DB::table('revistas')
				->join('indezadores_revistas', 'indezadores_revistas.id_revista', '=', 'revistas.id_revista')
				->join('sistemas_indexadores', 'sistemas_indexadores.id', '=', 'indezadores_revistas.id_sistema')
				->when($tipo, function ($query, $tipo) {
					return $query->where('revistas.tipo_revista', $tipo);
				})
				->when($area_id, function ($query, $area_id) {
					return $query->where('revistas.id_area_conocimiento', $area_id);
				})
				->when($subsistema_id, function ($query, $subsistema_id) {
					return $query->where('revistas.id_subsistema', $subsistema_id);
				})
				->select('sistemas_indexadores.nombre as name', DB::raw('count(*) as y'))
				->groupBy('sistemas_indexadores.nombre')
				->get();
		} elseif (isset($entidad_id)) {
			$totales = DB::table('revistas')
				->join('indezadores_revistas', 'indezadores_revistas.id_revista', '=', 'revistas.id_revista')
				->join('sistemas_indexadores', 'sistemas_indexadores.id', '=', 'indezadores_revistas.id_sistema')
				->join('entidad_editoras_revistas', 'entidad_editoras_revistas.id_revista', '=', 'revistas.id_revista')
				->join('entidad_editoras', 'entidad_editoras.id', '=', 'entidad_editoras_revistas.id_entidad_editora')
				->where('entidad_editoras.id', $entidad_id)
				->select('sistemas_indexadores.nombre as name', DB::raw('count(*) as y'))
				->groupBy('sistemas_indexadores.nombre')
				->get();
		} elseif (isset($indice_id)) {
			$totales = DB::table('revistas')
				->join('indezadores_revistas', 'indezadores_revistas.id_revista', '=', 'revistas.id_revista')
				->join('sistemas_indexadores', 'sistemas_indexadores.id', '=', 'indezadores_revistas.id_sistema')
				->where('sistemas_indexadores.id', $indice_id)
				->select('sistemas_indexadores.nombre as name', DB::raw('count(*) as y'))
				->groupBy('sistemas_indexadores.nombre')
				->orderBy('sistemas_indexadores.nombre', 'asc')
				->get();

		} elseif (isset($old_revistas)) {
			$totales = DB::table('revistas')
				->join('indezadores_revistas', 'indezadores_revistas.id_revista', '=', 'revistas.id_revista')
				->join('sistemas_indexadores', 'sistemas_indexadores.id', '=', 'indezadores_revistas.id_sistema')
				->where('revistas.situacion', 'Descontinuada')
				->select('sistemas_indexadores.nombre as name', DB::raw('count(*) as y'))
				->groupBy('sistemas_indexadores.nombre')
				->orderBy('sistemas_indexadores.nombre', 'asc')
				->get();
		} else {
			$totales = Revista::select(DB::raw("sistemas_indexadores.nombre as name, COUNT(*) as y"))
				->join('indezadores_revistas', 'indezadores_revistas.id_revista', '=', 'revistas.id_revista')
				->join('sistemas_indexadores', 'sistemas_indexadores.id', '=', 'indezadores_revistas.id_sistema')
				->groupBy(DB::raw('sistemas_indexadores.nombre'))
				->get();
		}

		return $totales;
	}

	public function agruparRevistasPorSubsistemas($tipo, $area_id, $indice_id, $entidad_id, $subsistema_id, $old_revistas) {
		$totales;
		if (isset($tipo) || isset($area_id) || $subsistema_id) {

			$totales = Revista::vigente()->select(DB::raw("subsistemas.nombre as name, COUNT(*) as y"))
				->join('subsistemas', 'subsistemas.id', '=', 'revistas.id_subsistema')
				->when($tipo, function ($query, $tipo) {
					return $query->where('revistas.tipo_revista', $tipo);
				})
				->when($area_id, function ($query, $area_id) {
					return $query->where('revistas.id_area_conocimiento', $area_id);
				})
				->when($subsistema_id, function ($query, $subsistema_id) {
					return $query->where('revistas.id_subsistema', $subsistema_id);
				})
				->groupBy(DB::raw('subsistemas.nombre'))
				->orderBy('subsistemas.nombre', 'asc')
				->get();
		} elseif (isset($entidad_id)) {

			$totales = Revista::vigente()->select(DB::raw("subsistemas.nombre as name, COUNT(*) as y"))
				->join('subsistemas', 'subsistemas.id', '=', 'revistas.id_subsistema')
				->join('entidad_editoras_revistas', 'entidad_editoras_revistas.id_revista', '=', 'revistas.id_revista')
				->join('entidad_editoras', 'entidad_editoras.id', '=', 'entidad_editoras_revistas.id_entidad_editora')
				->where('entidad_editoras.id', $entidad_id)
				->groupBy(DB::raw('subsistemas.nombre'))
				->orderBy('subsistemas.nombre', 'asc')
				->get();

		} elseif (isset($indice_id)) {

			$totales = Revista::vigente()->select(DB::raw("subsistemas.nombre as name, COUNT(*) as y"))
				->join('subsistemas', 'subsistemas.id', '=', 'revistas.id_subsistema')
				->join('indezadores_revistas', 'indezadores_revistas.id_revista', '=', 'revistas.id_revista')
				->join('sistemas_indexadores', 'sistemas_indexadores.id', '=', 'indezadores_revistas.id_sistema')
				->where('sistemas_indexadores.id', $indice_id)
				->groupBy(DB::raw('subsistemas.nombre'))
				->orderBy('subsistemas.nombre', 'asc')
				->get();

		} elseif (isset($old_revistas)) {

			$totales = Revista::select(DB::raw("subsistemas.nombre as name, COUNT(*) as y"))
				->join('subsistemas', 'subsistemas.id', '=', 'revistas.id_subsistema')
				->where('revistas.situacion', 'Descontinuada')
				->groupBy(DB::raw('subsistemas.nombre'))
				->orderBy('subsistemas.nombre', 'asc')
				->get();

		} else {
			$totales = Revista::vigente()->select(DB::raw("subsistemas.nombre as name, COUNT(*) as y"))
				->join('subsistemas', 'subsistemas.id', '=', 'revistas.id_subsistema')
				->groupBy(DB::raw('subsistemas.nombre'))
				->orderBy('subsistemas.nombre', 'asc')
				->get();
		}

		return $totales;
	}
}