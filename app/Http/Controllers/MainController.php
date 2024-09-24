<?php

namespace App\Http\Controllers;

use App\Models\AreasConocimiento;
use App\Models\Revista;
use App\Models\SistemaIndexador;
use App\Services\SolrService;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class MainController extends Controller {

	protected $solrService, $client;

	public function __construct(SolrService $solrService, \Solarium\Client $client) {

		$this->solrService = $solrService;
		$this->client = $client;
	}

	public function index() {
		$typos = Revista::distinct()->get(['tipo_revista']);
		$areas = DB::table('areas_conocimiento')->select('id', 'nombre')->orderBy('nombre')->get();
		$indexadores = DB::table('sistemas_indexadores')->select('id', 'nombre')->orderBy('nombre')->get();
		// Obteniendo los tipos de revistas y la cantidad de revistas asociadas
		$typos_count = Revista::where('situacion', '=', 'Vigente')->select('tipo_revista', DB::raw("COUNT(tipo_revista) as count"))
			->groupBy('tipo_revista')
			->get();
		// Obteniendo las distintas áreas de conocimiento y la cantidad de revistas asociadas
		$areas_count = AreasConocimiento::select(['id', 'nombre'])->withCount(['revistas' => function (Builder $query){
				$query->where('situacion', '=', 'Vigente');
		}])->having('revistas_count', '>', 0)->orderBy('id')->get();
		
		$indexaciones_count = SistemaIndexador::select(['id', 'nombre'])->withCount(['revistas' => function (Builder $query){
				$query->where('situacion', '=', 'Vigente');
		}])->having('revistas_count', '>', 0)->orderBy('id')->get();

		// Calling the getHarvestedJournals from SolrService
		// $harvestedJournals = $this->solrService->getHarvestedJournals($this->client);
		// $publishingDates = $this->solrService->getPublishingDates($this->client);
		// dump($publishingDates);

		return view('welcome')->
			with([
			'tipos_revistas' => $typos,
			'areas_conocimiento' => $areas,
			'indexadores' => $indexadores,
			'typos_count' => $typos_count,
			'areas_count' => $areas_count,
			'indexaciones_count' => $indexaciones_count,
			// 'harvestedJournals' => $harvestedJournals,
			// 'publishingDates' => $publishingDates,
		]);
	}
}
