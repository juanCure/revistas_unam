<?php

namespace App\Http\Controllers;

use App\Models\Revista;
use App\Services\IndicesServicio;
use App\Services\SolrService;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Solarium\QueryType\Select\Query\Query;
use Illuminate\Support\Facades\Log;
use Throwable;

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
		try{
			$idMod = $request->input('idMod');
			$searchTerm = $request->input('buscar');
			$selected_publishDates = $request->input('selected_publishDates');
			$selected_journals = $request->input('selected_journals');

			// This search is for article
			if (isset($idMod) && $idMod == 0) {
				$strQuery = $this->sanitizeSolrQuery($searchTerm);
				$query = $this->client->createQuery($this->client::QUERY_SELECT);
				// This line is very important because the default query operator is AND, and it should be OR
				$query->setQueryDefaultOperator(Query::QUERY_OPERATOR_OR);
				// $query = $this->client->createSelect();
				$query->setQuery($strQuery);
				// Define your fields and their weights as a single space-separated string
				$queryFieldsString = 'title_txt_en^3.0 title_txt_es^3.0 subject_en^2.0 subject_es^2.0 description_txt_en^1.0 description_txt_es^1.0';
				// Configure eDisMax parser to search across multi-language fields
				$edismax = $query->getEDisMax();
				$edismax->setQueryFields($queryFieldsString);

				// 3. Set the fields you want to recover (Fl - Field List)
				// Only fetch required data to optimize bandwidth and memory
				$query->setFields([
					'journal_title', 
					'locale_s', 
					'issne', 
					'title_txt_es', 
					'title_txt_en',
					'subject_es',
					'subject_en',
					'authors_t',
					'description_txt_es',
					'description_txt_en',
					'doi_s', 
					'url_s', 
					'published_year_s'
				]);

				// get the facetset component
				$facetSet = $query->getFacetSet();

				// FilterQueries
				// Filter all the documents which their publishdate is 2018 and 2016
				// $query->createFilterQuery('publishdate')->setQuery('publishDate:(2018 or 2016)');
				//Filter all the documents from Mundo Nano journal
				// $query->createFilterQuery('journals')->setQuery('collection:"Mundo nano"');

				// If the selected_publishDates is set then iterate to add them to the filterQuery
				if (isset($selected_publishDates)) {
					$collection_publishDates = collect($selected_publishDates);
					$strFilterQuery = "published_year_s:({$collection_publishDates->implode(' or ')})";
					$query->createFilterQuery('published_year_s')->setQuery($strFilterQuery)->addTag('selected_publishDates');
				}
				// If the selected_journals array is set then iterate through it to create a filterQuery
				if (isset($selected_journals)) {
					// $journals_collection = collect($selected_journals);
					$strFilterQuery = "journal_title:\"{$selected_journals[0]}\"";
					$query->createFilterQuery('journals')->setQuery($strFilterQuery)->addTag('selected_journals');
				}

				// FacetFields
				// Creating a facet over the publishDate field
				// $facetSet->createFacetField('pub_date')->setField('publishDate')->setMinCount(1);
				$facetSet->createFacetField('facet_year')->setField('published_year_s')->setMinCount(1)->getLocalParameters()->addExcludes(['selected_publishDates']);

				$facetSet->createFacetField('facet_journal')->setField('journal_title')->setMinCount(1);
				// $facetSet->createFacetField('facet_journal')->setField('collection')->setMinCount(1)->getLocalParameters()->addExcludes(['selected_journals']);

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
				$resultset_facet_year = $resultset->getFacetSet()->getFacet('facet_year');
				// $journalsFacet = $resultset->getFacetSet()->getFacet('journals');
				$resultset_facet_journal = $resultset->getFacetSet()->getFacet('facet_journal');
				$numFound = $resultset->getNumFound();
				$resultset = $this->proccessResultSet($resultset);

				$mypaginator = $this->paginate($request, $resultset, $numFound, $resultsPerPage, $page);
				$publishDateArray = $this->processFacet($resultset_facet_year, $selected_publishDates)->toArray();
				$journalsArray = $this->processFacet($resultset_facet_journal, $selected_journals)->toArray();

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
					'solrAvailable' => true,
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
		} catch (\Solarium\Exception $e) {
			Log::error('Error de conexión con Solr: ' . $e->getMessage());
			if ($request->expectsJson()) {
				return response()->json([
					'error' => true,
					'message' => 'El servición de búsqueda por título de artículo no se encuentra disponible temporalmente.'
				], 503);
			}
		} catch (Throwable $e) {
			// Atrapa fallos críticos de red, Timeouts de cURL, errores de DNS o conexión caída
			Log::error('Fallo de conexión o Timeout con Solr en [getHarvestedJournals]: ' . $e->getMessage());
		}
	}

	public function advancedSearch(Request $request) {
		try{
			// The both below are the filters
			$selected_publishDates = $request->input('selected_publishDates');
			$selected_journals = $request->input('selected_journals');
			// The next 5 fields are the available searching parameters
			$requested_journal = $request->input('requested_journal');
			$published_date_from = $request->input('publish_date_from');
			$published_date_to = $request->input('publish_date_to');
			$author_name = $request->input('author_name');
			$searchTerm = $request->input('searchTerm');

			$query = $this->client->createQuery($this->client::QUERY_SELECT);
			// This line is very important because the default query operator is AND, and it should be OR
			$query->setQueryDefaultOperator(Query::QUERY_OPERATOR_OR);
			// Define your fields and their weights as a single space-separated string
			$queryFieldsString = "";
			
			// Reviewing if journal title was set up
			if (isset($requested_journal)) {
				$fq_journal = "journal_title:\"" . $requested_journal . "\"";
				$query->createFilterQuery('fq_journal')->setQuery($fq_journal);
				$queryFieldsString .= " journal_title^3.0";
			}
			// Reviewing if publication period was set up
			if (isset($published_date_from) && $selected_publishDates == null) {
				if (isset($published_date_to)) {
					$fq_dates = "published_year_s:[" . $published_date_from . " TO " . $published_date_to . "]";
				} else {
					$fq_dates = "published_year_s:[" . $published_date_from . " TO * ]";
				}
				$query->createFilterQuery('fq_dates')->setQuery($fq_dates);
			} elseif (isset($selected_publishDates)) {
				// I need to set a query filter with the selected years in the publish date filter
				$collection_publishDates = collect($selected_publishDates);
				$strFilterQuery = " published_year_s:({$collection_publishDates->implode(' or ')})";
				$query->createFilterQuery('publishdate')->setQuery($strFilterQuery)->addTag('fecha_publicacion');
			}

			// Reviewing if the author field was set up
			if (isset($author_name)) {
				$strQuery = "authors_t:{$author_name}";
				$query->createFilterQuery('author')->setQuery($strQuery);
				$queryFieldsString .= " authors_t^3.0";
			}
			// Reviewing if there was a searchTerm set up
			if (isset($searchTerm)) {
				$strQuery = $this->sanitizeSolrQuery($searchTerm);
				$query->setQuery($strQuery);
				$queryFieldsString .= ' title_txt_en^3.0 title_txt_es^3.0 subject_en^2.0 subject_es^2.0 description_txt_en^1.0 description_txt_es^1.0';
			}
			// Configure eDisMax parser to search across multi-language fields
			$edismax = $query->getEDisMax();
			$edismax->setQueryFields($queryFieldsString);

			// Set the fields you want to recover (Fl - Field List)
			// Only fetch required data to optimize bandwidth and memory
			$query->setFields([
				'journal_title', 
				'locale_s', 
				'issne', 
				'title_txt_es', 
				'title_txt_en',
				'subject_es',
				'subject_en',
				'authors_t',
				'description_txt_es',
				'description_txt_en',
				'doi_s', 
				'url_s', 
				'published_year_s'
			]);

			// Get the facetset component
			$facetSet = $query->getFacetSet();

			// FacetFields
			// Creating a facet over the published_year_s field
			$facetSet->createFacetField('facet_year')->setField('published_year_s')->setMinCount(1)->getLocalParameters()->addExcludes(['selected_publishDates']);

			$facetSet->createFacetField('facet_journal')->setField('journal_title')->setMinCount(1);

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
			$resultset_facet_year = $resultset->getFacetSet()->getFacet('facet_year');
			$resultset_facet_journal = $resultset->getFacetSet()->getFacet('facet_journal');
			$numFound = $resultset->getNumFound();
			$resultset = $this->proccessResultSet($resultset);

			$mypaginator = $this->paginate($request, $resultset, $numFound, $resultsPerPage, $page);
			$publishDateArray = $this->processFacet($resultset_facet_year, $selected_publishDates)->toArray();
			$journalsArray = $this->processFacet($resultset_facet_journal, $selected_journals)->toArray();

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
				'solrAvailable' => true
			]);
		} catch (\Solarium\Exception $e) {
			Log::error('Error de conexión con Solr: ' . $e->getMessage());
			if ($request->expectsJson()) {
				return response()->json([
					'error' => true,
					'message' => 'El servición de búsqueda por título de artículo no se encuentra disponible temporalmente.'
				], 503);
			}
		} catch (Throwable $e) {
			// Atrapa fallos críticos de red, Timeouts de cURL, errores de DNS o conexión caída
			Log::error('Fallo de conexión o Timeout con Solr en [getHarvestedJournals]: ' . $e->getMessage());
		}
	}

	public function proccessResultSet($resulset) {
		$collection_resultset = collect();
		foreach ($resulset as $document) {
			$suffix = $document['locale_s'] ?? 'en'; 
			// Se itera sobre el documento para acceder a cada campo
			$item = [];
			foreach ($document as $field => $value) {
				if (is_array($value) && $field == "authors_t") {
					$author_collection = collect($value);
					$imploded_authors = $author_collection->implode('; ');
					$item[$field] = $imploded_authors;
					continue;
				}
				if (is_array($value) && $field == "subject_{$suffix}") {
					$keyword_collection = collect($value);
					$imploded_subject = $keyword_collection->implode('; ');
					$item[$field] = $imploded_subject;
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
	 * 
	 * This function processes the returned facet to add some attributes for the view
	 * @return $publishDateArray = [
	 *	['checkbox_id' => 2014, 'count' => 18, 'is_checked' => true],
	 *	['checkbox_id' => 2016, 'count' => 15, 'is_checked' => true],
	 *	['checkbox_id' => 2017, 'count' => 12, 'is_checked' => false],
	 *	];
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

	/**
     * Safely escapes Solr query syntax rules to prevent injection errors.
     */
    private function sanitizeSolrQuery($string) {

		if(empty($string)) {
			$strQuery = "*:*";
			return $strQuery;
		} else {
			// Trim basic whitespace
			$string = trim($string);

			// Escape Solr special query operators: + - && || ! ( ) { } [ ] ^ " ~ * ? : \ /
			// This stops users from typing a single broken brace or quote and breaking the server
			$pattern = '/([\\+\\-\\&\\|\\!\\(\\)\\{\\}\\[\\]\\^\\"\\~\\*\\?\\:\\\\\\/])/';
			
			return preg_replace($pattern, '\\\\$1', $string);

		}
    }

}
