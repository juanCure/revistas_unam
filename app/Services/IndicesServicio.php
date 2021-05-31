<?php

namespace App\Services;

use App\Models\Revista;
use Illuminate\Support\Facades\DB;

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
}