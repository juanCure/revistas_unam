<?php

namespace App\Http\Controllers;

use App\Models\AreasConocimiento;
use App\Models\EntidadEditora;
use App\Models\Revista;
use App\Models\SistemaIndexador;
use App\Models\Subsistema;
use App\Services\IndicesServicio;
use Illuminate\Http\Request;

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
		// dump($letra);

		$per_page = $request->per_page ?? 20;
		// dump($per_page);

		$arbitrada = $request->arbitrada;

		$soporte = $request->soporte;

		$revistas = Revista::when($tipo, function ($query, $tipo) {
			return $query->where('tipo_revista', $tipo);
		})->when($letra, function ($query, $letra) {
			return $query->where('titulo', 'like', "{$letra}%");
		})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})
			->sortable()
			->paginate($per_page)
			->withQueryString();

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

		$revistas = Revista::when($area_id, function ($query, $area_id) {
			return $query->where('id_area_conocimiento', $area_id);
		})->when($letra, function ($query, $letra) {
			return $query->where('titulo', 'like', "{$letra}%");
		})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->sortable()->paginate($per_page)->withQueryString();

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

		$revistas = SistemaIndexador::find($indice_id)
			->revistas()
			->when($letra, function ($query, $letra) {
				return $query->where('titulo', 'like', "{$letra}%");
			})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})
			->sortable()
			->paginate($per_page)
			->withQueryString();

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

		$revistas = EntidadEditora::find($entidad_id)
			->revistas()
			->when($letra, function ($query, $letra) {
				return $query->where('titulo', 'like', "{$letra}%");
			})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})
			->sortable()
			->paginate(20)
			->withQueryString();

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

		$revistas = Revista::when($subsistema_id, function ($query, $subsistema_id) {
			return $query->where('id_subsistema', $subsistema_id);
		})->when($letra, function ($query, $letra) {
			return $query->where('titulo', 'like', "{$letra}%");
		})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->sortable()->paginate($per_page)->withQueryString();

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
		return view('revistas.ficha')->with([
			'revista' => $revista,
		])->render();
	}

	public function getTodosTiposRevistas(Request $request) {
		$indices = $this->indicesServicio->getIndices();
		$alfabeto = $this->indicesServicio->getAlfabeto();
		$letra = $request->abc;

		$per_page = $request->per_page ?? 20;

		$arbitrada = $request->arbitrada;

		$soporte = $request->soporte;

		$revistas = Revista::when($letra, function ($query, $letra) {
			$query->where('titulo', 'like', "{$letra}%");
		})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->sortable()->paginate($per_page)->withQueryString();

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

		$revistas = Revista::where('situacion', 'Descontinuada')
			->when($letra, function ($query, $letra) {
				$query->where('titulo', 'like', "{$letra}%");
			})->when($arbitrada, function ($query, $arbitrada) {
			return $query->where('arbitrada', $arbitrada);
		})->when($soporte, function ($query, $soporte) {
			return $query->where('soporte', $soporte);
		})->sortable()->paginate($per_page)->withQueryString();

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
}