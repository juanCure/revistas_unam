<?php

namespace App\Http\Controllers;

use App\Models\Revista;
use App\Services\IndicesServicio;
use App\Services\SolrService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Solarium\QueryType\Select\Query\Query;

class SolariumController extends Controller {
	protected $client, $indicesServicio, $solrService;

	public function __construct(\Solarium\Client $client, IndicesServicio $indicesServicio, SolrService $solrService) {
		$this->client = $client;
		$this->indicesServicio = $indicesServicio;
		$this->solrService = $solrService;
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

	public function search(Request $request) {
		$idMod = $request->input('idMod');
		$searchTerm = $request->input('buscar');
		$selected_publishDates = $request->input('selected_publishDates');
		$selected_journals = $request->input('selected_journals');
		// $searchTerm = trim($searchTerm);
		// $searchTerm = str_replace(":", "\:", $searchTerm);
		// $strQuery = "(title:/[A-Z]*" . $searchTerm . "[A-Z]*/)";
		$strQuery = $this->solrService->cleanInputSearchTerm($searchTerm);

		if (isset($idMod) && $idMod == 0) {
			//Busqueda por artículo
			$query = $this->client->createSelect();
			// This line is very important because the default query operator is AND, and it should be OR
			$query->setQueryDefaultOperator(Query::QUERY_OPERATOR_OR);
			// get the facetset component
			$facetSet = $query->getFacetSet();

			$query->setQuery($strQuery);

			$query->setFields(array('collection', 'title', 'author_facet', 'publishDate', 'issn', 'url', 'pclave_txt_mv', 'doi_txt', 'description'));

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
					'path' => $request->path(),
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
				'path' => $request->path(),
			]);
		} else {
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

	public function advancedSearching(Request $request) {
		// The both below are the filters
		$selected_publishDates = $request->input('selected_publishDates');
		$selected_journals = $request->input('selected_journals');
		// The next 5 fields are the available searching parameters
		$requested_journal = $request->input('requested_journal');
		$published_date_from = $request->input('publish_date_from');
		$published_date_to = $request->input('publish_date_to');
		$author_name = $request->input('author_name');
		$searchTerm = $request->input('searchTerm');

		$query = $this->client->createSelect();
		// This line is very important because the default query operator is AND, and it should be OR
		$query->setQueryDefaultOperator(Query::QUERY_OPERATOR_OR);
		// get the facetset component
		$facetSet = $query->getFacetSet();

		$resultsPerPage = 15;
		$startPage = $query->getStart();
		$page = max(0, Paginator::resolveCurrentPage());
		$offset = ($page * $resultsPerPage) - $resultsPerPage;
		// Set the number of results to return
		$query->setRows($resultsPerPage);
		// Set the 0-based result to start from, taking into account pagination
		$query->setStart($offset);

		// $fq_journal = "collection:\"Investigaciones Geográficas\"";
		// $query->createFilterQuery('fq_journal')->setQuery($fq_journal);
		if (isset($published_date_from) && $selected_publishDates == null) {
			if (isset($published_date_to)) {
				$fq_dates = "publishDate:[" . $published_date_from . " TO " . $published_date_to . "]";
			} else {
				$fq_dates = "publishDate:[" . $published_date_from . " TO * ]";
			}

			$query->createFilterQuery('fq_dates')->setQuery($fq_dates);
		} elseif (isset($selected_publishDates)) {
			// I need to set a query filter with the selected years in the publish date filter
			$collection_publishDates = collect($selected_publishDates);
			$strFilterQuery = "publishDate:({$collection_publishDates->implode(' or ')})";
			$query->createFilterQuery('publishdate')->setQuery($strFilterQuery)->addTag('fecha_publicacion');
		}

		// $fq_author = "author_facet:\"Ordorika, Imanol\"";
		// $query->createFilterQuery('fq_author')->setQuery($fq_author);
		// $fq_title = "title:\"ciencia\"";
		// $query->createFilterQuery('fq_title')->setQuery($fq_title);

		if (isset($requested_journal)) {
			$fq_journal = "collection:\"" . $requested_journal . "\"";
			// dd($fq_journal);
			$query->createFilterQuery('fq_journal')->setQuery($fq_journal);
		}

		if (isset($author_name)) {
			$strQuery = "author:{$author_name}";
			$query->createFilterQuery('author')->setQuery($strQuery);
		}
		if (isset($searchTerm)) {
			$strQuery = $this->solrService->cleanInputSearchTerm($searchTerm);
			$query->createFilterQuery('title')->setQuery($strQuery)->addTag('fq_title');
		}

		// FacetFields
		// Creating a facet over the publishDate field
		$facetSet->createFacetField('unfiltered')->setField('publishDate')->setMinCount(1)->getLocalParameters()->addExcludes(['fecha_publicacion']);

		$facetSet->createFacetField('unFilteredJournals')->setField('collection')->setMinCount(1);

		$resultset = $this->client->execute($query);
		$numFound = $resultset->getNumFound();

		$unFilteredPublishDateFacet = $resultset->getFacetSet()->getFacet('unfiltered');
		// $journalsFacet = $resultset->getFacetSet()->getFacet('journals');
		$unFilteredJournalsFacet = $resultset->getFacetSet()->getFacet('unFilteredJournals');
		$publishDateArray = $this->processFacet($unFilteredPublishDateFacet, $selected_publishDates)->toArray();
		$journalsArray = $this->processFacet($unFilteredJournalsFacet, $selected_journals)->toArray();

		$resultset = $this->proccessResultSet($resultset);
		$mypaginator = $this->paginate($request, $resultset, $numFound, $resultsPerPage, $page);

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
				'path' => $request->path(),
			])->render();
		}
		return view('resultados.resultadosBusquedaAvanzada', [
			'resultset' => $resultset,
			'numFound' => $numFound,
			'mypaginator' => $mypaginator,
			'publishDateArray' => $publishDateArray,
			'journalsArray' => $journalsArray,
			'searchTerm' => $searchTerm,
			'selected_publishDates' => $selected_publishDates,
			'selected_journals' => $selected_journals,
			'requested_journal' => $requested_journal,
			'published_date_from' => $published_date_from,
			'published_date_to' => $published_date_to,
			'author_name' => $author_name,
			'searchTerm' => $searchTerm, 
			'path' => $request->path(),
		]);

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
