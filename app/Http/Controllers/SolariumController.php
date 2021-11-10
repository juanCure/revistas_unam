<?php

namespace App\Http\Controllers;

use App\Models\Revista;
use App\Services\IndicesServicio;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class SolariumController extends Controller {
	protected $client, $indicesServicio;

	public function __construct(\Solarium\Client $client, IndicesServicio $indicesServicio) {
		$this->client = $client;
		$this->indicesServicio = $indicesServicio;
	}

	public function ping() {
		// create a ping query
		$ping = $this->client->createPing();

		// execute the ping query
		try {
			$this->client->ping($ping);
			return response()->json('OK');
		} catch (\Solarium\Exception $e) {
			return response()->json('ERROR', 500);
		}
	}

	/**
	 *   Funcion principal para buscar en Solr
	 *   y regresar los registros a la vista
	 **/
	// public function search(Request $request) {

	// 	$palabra = $request->input('buscar');
	// 	$idMod = $request->input('idMod');

	// 	$palabra = trim($palabra);
	// 	//Solr no permite caracteres especiales, por eso hay que escaparlos
	// 	$palabra = str_replace(":", "\:", $palabra);

	// 	// Getting the value from request
	// 	// $pub_date_filter = $request->input('pub_date');
	// 	$pub_date_filters = $request->input('selected_ids');
	// 	// $journal_filter = $request->input('journal');

	// 	// Si se busca por Articulo, se hace la petición al SOLR del servidor 132.248.204.81
	// 	// si la busqueda es por revista, entonces la busqueda se realiza a la base de datos
	// 	// revistas_unam_normalizada_laravel
	// 	if (isset($idMod) && $idMod == 0) {

	// 		// dump("Estoy en la busqueda por artículo");
	// 		// echo "Se debe buscar en solr";
	// 		//se elige el endpoint del que queremos consumir
	// 		$this->client->setDefaultEndPoint('biblio');
	// 		//Se incrementa a 10s el timeout para que no se rechaze la conexion
	// 		// $this->client->setAdapter('Solarium\Core\Client\Adapter\Curl');
	// 		// $this->client->getAdapter()->setTimeout(18);

	// 		$query = $this->client->createSelect();

	// 		$perPage = 10;
	// 		$startPage = $query->getStart();
	// 		$page = max(0, Paginator::resolveCurrentPage());
	// 		$offset = ($page * $perPage) - $perPage;
	// 		$strQuery = "(title:/[A-Z]*" . $palabra . "[A-Z]*/)";

	// 		// get the facetset component
	// 		$facetSet = $query->getFacetSet();

	// 		// create the facet field instance and set options
	// 		// $facetSet->createFacetField('revista')->setField('collection')->setMinCount(1);

	// 		// Test adding filterqueries
	// 		if (isset($pub_date_filters)) {
	// 			// $query->createFilterQuery('publicacion')->setQuery('publishDate:"' . $pub_date_filter . '"')->addTag('fecha_publicacion');
	// 			foreach ($pub_date_filters as $pub_date_id) {
	// 				dump($pub_date_id);
	// 				$query->createFilterQuery('publicacion' . $pub_date_id)->setQuery('publishDate:"' . $pub_date_id . '"')->addTag('fecha_publicacion');
	// 			}
	// 		}

	// 		// create the facet field instance for pub_date and set options
	// 		$facetSet->createFacetField('pub_date')->setField('publishDate')->setMinCount(1);
	// 		$facetSet->createFacetField('unfiltered')->setField('publishDate')->setMinCount(1)->getLocalParameters()->addExcludes(['fecha_publicacion']);

	// 		// if (isset($journal_filter)) {
	// 		// 	$query->createFilterQuery('nombre_revista')->setQuery('collection:"' . $journal_filter . '"');
	// 		// }

	// 		$query->setQuery($strQuery);
	// 		$query->setStart($offset)->setRows($perPage);
	// 		$resultset = $this->client->select($query);
	// 		$numRevistas = $resultset->getNumFound();

	// 		// $facetRevista = $resultset->getFacetSet()->getFacet('revista');
	// 		$facetPublishDate = $resultset->getFacetSet()->getFacet('pub_date');
	// 		$unFilteredPublishDateFacet = $resultset->getFacetSet()->getFacet('unfiltered');
	// 		// dump('Facet counts for field publishDate');
	// 		// foreach ($facetPublishDate as $value => $count) {
	// 		// 	dump($value . '[' . $count . ']');
	// 		// }

	// 		$numRevistas = $resultset->getNumFound();

	// 		$revistas = $this->procesaResultados($resultset);
	// 		$mypaginator = $this->paginate($revistas, $numRevistas, $perPage, $page, $palabra);

	// 		//Se regresan a la normalidad los caracteres escapados
	// 		$palabra = str_replace("\:", ":", $palabra);

	// 		if ($request->ajax()) {
	// 			return view('resultados.bSolrIndex')->with([
	// 				'revistas' => $revistas,
	// 				'numRevistas' => $numRevistas,
	// 				'palabra' => $palabra,
	// 				'idMod' => $idMod,
	// 				'mypaginator' => $mypaginator,
	// 				// 'facetRevista' => $facetRevista,
	// 				'facetPublishDate' => $unFilteredPublishDateFacet,
	// 				'checkbox_id' => $request->checkbox_id
	// 				,
	// 			])->render();
	// 		}
	// 		return view('resultados.resultadosBusquedaPorArticulos')->with([
	// 			'revistas' => $revistas,
	// 			'numRevistas' => $numRevistas,
	// 			'palabra' => $palabra,
	// 			'idMod' => $idMod,
	// 			'mypaginator' => $mypaginator,
	// 			// 'facetRevista' => $facetRevista,
	// 			'facetPublishDate' => $facetPublishDate,
	// 		]);
	// 		// return view('resultados.resultadosBusquedaPorArticulos', compact('revistas', 'numRevistas', 'palabra', 'idMod', 'mypaginator', 'facetRevista', 'facetPublishDate'));

	// 	} else {
	// 		// dump("Estoy en la busqueda por revista");
	// 		// echo "Se debe buscar en la base de datos del proyecto de laravel";
	// 		$indices = $this->indicesServicio->getIndices();

	// 		$alfabeto = $this->indicesServicio->getAlfabeto();

	// 		return view('resultados.resultadosPorIndices', [
	// 			'revistas' => Revista::where('titulo', 'like', '%' . $palabra . '%')->paginate(5),
	// 			'tipos_revistas' => $indices['typos'],
	// 			'areas_conocimiento' => $indices['areas'],
	// 			'indexadores' => $indices['indexadores'],
	// 			'alfabeto' => $alfabeto,
	// 			'accion' => 'Busqueda básica',
	// 			'filtro' => $palabra,
	// 			'breadcrumb' => 'Busqueda básica',
	// 			'idMod' => $idMod,
	// 		]);
	// 	}

	// }

	public function search(Request $request) {
		$idMod = $request->input('idMod');
		$searchTerm = $request->input('buscar');
		$selected_publishDates = $request->input('selected_publishDates');
		$selected_journals = $request->input('selected_journals');
		$searchTerm = trim($searchTerm);
		$searchTerm = str_replace(":", "\:", $searchTerm);
		$strQuery = "(title:/[A-Z]*" . $searchTerm . "[A-Z]*/)";

		if (isset($idMod) && $idMod == 0) {
			//Busqueda por artículo
			$query = $this->client->createSelect();
			// get the facetset component
			$facetSet = $query->getFacetSet();

			$query->setQuery($strQuery);

			$query->setFields(array('collection', 'title', 'author_facet', 'publishDate', 'issn'));

			// FilterQueries
			// Filter all the documents which their publishdate is 2018 and 2016
			// $query->createFilterQuery('publishdate')->setQuery('publishDate:(2018 or 2016)');
			//Filter all the documents from Mundo Nano journal
			// $query->createFilterQuery('journals')->setQuery('collection:"Mundo nano"');

			// If the selected_publishDates is set then iterate to add them to the filterQuery
			if (isset($selected_publishDates)) {
				$collection_publishDates = collect($selected_publishDates);
				$strFilterQuery = "publishDate:({$collection_publishDates->implode(' or ')})";
				$query->createFilterQuery('publishdate')->setQuery($strFilterQuery)->addTag('fecha_publicacion');
			}
			// If the selected_journals array is set then iterate through it to create a filterQuery
			if (isset($selected_journals)) {
				// $journals_collection = collect($selected_journals);
				$strFilterQuery = "collection:\"{$selected_journals[0]}\"";
				$query->createFilterQuery('journals')->setQuery($strFilterQuery)->addTag('selected_journals');
			}

			// FacetFields
			// Creating a facet over the publishDate field
			// $facetSet->createFacetField('pub_date')->setField('publishDate')->setMinCount(1);
			$facetSet->createFacetField('unfiltered')->setField('publishDate')->setMinCount(1)->getLocalParameters()->addExcludes(['fecha_publicacion']);

			$facetSet->createFacetField('unFilteredJournals')->setField('collection')->setMinCount(1);
			// $facetSet->createFacetField('unFilteredJournals')->setField('collection')->setMinCount(1)->getLocalParameters()->addExcludes(['selected_journals']);

			$resultsPerPage = 15;
			$startPage = $query->getStart();
			$page = max(0, Paginator::resolveCurrentPage());
			$offset = ($page * $resultsPerPage) - $resultsPerPage;
			// Set the number of results to return
			$query->setRows($resultsPerPage);
			// Set the 0-based result to start from, taking into account pagination
			$query->setStart($offset);

			// sort the results by price ascending
			// $query->addSort('publishDate', $query::SORT_ASC);

			// this executes the query and returns the result
			$resultset = $this->client->execute($query);
			// dump($resultset);
			// $publishDateFacet = $resultset->getFacetSet()->getFacet('pub_date');
			$unFilteredPublishDateFacet = $resultset->getFacetSet()->getFacet('unfiltered');
			// $journalsFacet = $resultset->getFacetSet()->getFacet('journals');
			$unFilteredJournalsFacet = $resultset->getFacetSet()->getFacet('unFilteredJournals');
			$numFound = $resultset->getNumFound();
			$resultset = $this->proccessResultSet($resultset);

			$mypaginator = $this->paginate($request, $resultset, $numFound, $resultsPerPage, $page);
			$publishDateArray = $this->processFacet($unFilteredPublishDateFacet, $selected_publishDates)->toArray();
			$journalsArray = $this->processFacet($unFilteredJournalsFacet, $selected_journals)->toArray();

			if ($request->ajax()) {
				return view('resultados.bSolrIndex', [
					'resultset' => $resultset,
					'numFound' => $numFound,
					'searchTerm' => $searchTerm,
					'mypaginator' => $mypaginator,
					'publishDateArray' => $publishDateArray,
					'selected_publishDates' => $selected_publishDates,
					'journalsArray' => $journalsArray,
					'selected_journals' => $selected_journals,
				])->render();
			}
			return view('resultados.resultadosBusquedaPorArticulos', [
				'resultset' => $resultset,
				'numFound' => $numFound,
				'searchTerm' => $searchTerm,
				'mypaginator' => $mypaginator,
				'publishDateArray' => $publishDateArray,
				'selected_publishDates' => $selected_publishDates,
				'journalsArray' => $journalsArray,
				'selected_journals' => $selected_journals,
			]);
		} else {
			// dump("Estoy en la busqueda por revista");
			// echo "Se debe buscar en la base de datos del proyecto de laravel";
			$indices = $this->indicesServicio->getIndices();

			$alfabeto = $this->indicesServicio->getAlfabeto();

			return view('resultados.resultadosPorIndices', [
				'revistas' => Revista::where('titulo', 'like', '%' . $searchTerm . '%')->paginate(5),
				'tipos_revistas' => $indices['typos'],
				'areas_conocimiento' => $indices['areas'],
				'indexadores' => $indices['indexadores'],
				'alfabeto' => $alfabeto,
				'accion' => 'Busqueda básica',
				'filtro' => $searchTerm,
				'breadcrumb' => 'Busqueda básica',
				'idMod' => $idMod,
			]);
		}
	}

	public function proccessResultSet($resulset) {
		$collection_resultset = collect();
		foreach ($resulset as $document) {
			// Se itera sobre el documento para acceder a cada campo
			$item = [];
			foreach ($document as $field => $value) {
				if (is_array($value) && $field != "issn") {
					$value = implode(', ', $value);
					$item[$field] = $value;
					continue;
				} elseif (is_array($value) && $field == "issn") {
					$item['myownissn'] = $value[0];
					$item['doi'] = count($value) == 3 ? $value[2] : null;
					continue;
				}
				$item[$field] = $value;
			}
			$collection_resultset->push($item);
		}
		// dump($collection_resultset);
		return $collection_resultset;
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	public function paginate(Request $request, $items, $resultset_total, $perPage, $page) {
		// $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
		$items = $items instanceof Collection ? $items : Collection::make($items);
		$options = [
			'page' => $page,
			'path' => Paginator::resolveCurrentPath(),
			'query' => $request->input(),
		];
		return new LengthAwarePaginator($items, $resultset_total, $perPage, $page, $options);
	}
	/**
	 * This function processes the returned facet to add some attributes for the view
	 * @return $publishDateArray = [
	['checkbox_id' => 2014, 'count' => 18, 'is_checked' => true],
	['checkbox_id' => 2016, 'count' => 15, 'is_checked' => true],
	['checkbox_id' => 2017, 'count' => 12, 'is_checked' => false],
	];
	 *
	 */
	public function processFacet($faceta, $selected) {
		$collection_facet = collect();
		$item = [];
		foreach ($faceta as $key => $value) {
			$is_checked = false;
			if (isset($selected)) {
				if (in_array($key, $selected)) {
					$is_checked = true;
				}
			}
			$item = [
				'checkbox_id' => $key,
				'count' => $value,
				'is_checked' => $is_checked,
			];
			$collection_facet->push($item);
		}

		return $collection_facet;
	}
}
