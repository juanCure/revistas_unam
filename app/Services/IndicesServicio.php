<?php

namespace App\Services;

use App\Models\EntidadEditora;
use App\Models\Revista;
use App\Models\SistemaIndexador;
use App\Models\Subsistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IndicesServicio {

	public function getIndices() {

		$typos = Revista::distinct()->get(['tipo_revista']);
		// $areas = AreasConocimiento::all();
		$areas = DB::table('areas_conocimiento')->select('id', 'nombre')->orderBy('nombre')->get();

		$indexadores = DB::table('sistemas_indexadores')->select('id', 'nombre')->orderBy('nombre')->get();

		return ['typos' => $typos,
			'areas' => $areas,
			'indexadores' => $indexadores];

	}

	public function getAlfabeto() {
		return range('A', 'Z');
	}

	public function getEntidadesEditoras() {
		return EntidadEditora::orderBy('nombre')->get();
		// return DB::table('entidad_editoras')->select('id', 'nombre')->orderBy('nombre')->get();
	}

	public function getSubsistemas() {
		return Subsistema::orderBy('nombre')->get();
		// return DB::table('entidad_editoras')->select('id', 'nombre')->orderBy('nombre')->get();
	}

	public function getTotalRevistas() {
		return Revista::situacion('Vigente')->get()->count();
	}

	public function getRevistas(Request $request) {
		
		$tipo = $request->tipo;
		$area_id = $request->area_id;
		$indice_id = $request->indice_id;
		$subsistema_id = $request->subsistema_id;
		$entidad_id = $request->entidad_id;
		$letra = $request->abc;
		$arbitrada = $request->arbitrada;
		$soporte = $request->soporte;
		$situacion = ($request->oldRevistas == 'Descontinuada') ? 'Descontinuada' : 'Vigente';
		//Log::info('Hi there! this is the situacion: ' . $situacion);


		if (isset($indice_id)) {
			$revistas = SistemaIndexador::find($indice_id)
				->revistas()->situacion($situacion)
				->when($letra, function ($query, $letra) {
					return $query->where('titulo', 'like', "{$letra}%");
				})
				->when($arbitrada, function ($query, $arbitrada) {
					return $query->where('arbitrada', $arbitrada);
				})
				->when($soporte, function ($query, $soporte) {
					return $query->where('soporte', $soporte);
				});
		} elseif (isset($entidad_id)) {
			$revistas = EntidadEditora::find($entidad_id)
				->revistas()->situacion($situacion)
				->when($letra, function ($query, $letra) {
					return $query->where('titulo', 'like', "{$letra}%");
				})
				->when($arbitrada, function ($query, $arbitrada) {
					return $query->where('arbitrada', $arbitrada);
				})
				->when($soporte, function ($query, $soporte) {
					return $query->where('soporte', $soporte);
				});
		} else {
			$revistas = Revista::situacion($situacion)->when($tipo, function ($query, $tipo) {
				return $query->where('tipo_revista', $tipo);
			})->when($area_id, function ($query, $area_id) {
				return $query->where('id_area_conocimiento', $area_id);
			})->when($subsistema_id, function ($query, $subsistema_id) {
				return $query->where('id_subsistema', $subsistema_id);
			})->when($letra, function ($query, $letra) {
				return $query->where('titulo', 'like', "{$letra}%");
			})->when($arbitrada, function ($query, $arbitrada) {
				return $query->where('arbitrada', $arbitrada);
			})->when($soporte, function ($query, $soporte) {
				return $query->where('soporte', $soporte);
			});
		}
		return $revistas;
	}

}