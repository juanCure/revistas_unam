<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Throwable;

class SolrService {

	protected $client;

	public function __construct(\Solarium\Client $client) {
		$this->client = $client;
	}

	public function getHarvestedJournals() {
		try {
			$query = $this->client->createSelect();
			$facetSet = $query->getFacetSet();
			$facetSet->createFacetField('journals')->setField('journal_title');
			$resultSet = $this->client->select($query);
			$journals = $resultSet->getFacetSet()->getFacet('journals');
			$journalsArray = [];
			foreach ($journals as $key => $value) {
				$journalsArray[] = $key;
			}
			$journals_collection = collect($journalsArray);
			return $journals_collection->sort()->values();
		} catch(\Solarium\Exception $e) {
			Log::error('Error en Solr [getHarvestedJournals]: ' . $e->getMessage());
			// Retornar colección vacía para que la vista no falle al iterar
            return collect();
		} catch (Throwable $e) {
			// Atrapa fallos críticos de red, Timeouts de cURL, errores de DNS o conexión caída
			Log::error('Fallo de conexión o Timeout con Solr en [getHarvestedJournals]: ' . $e->getMessage());
			return collect(); 
		}
	}

	public function getPublishingDates() {
		try {
			$query = $this->client->createSelect();
			$facetSet = $query->getFacetSet();
			$facetSet->createFacetField('publishingDates')->setField('published_year_s');
			$query->addSort('published_year_s', $query::SORT_DESC);
			$resultSet = $this->client->select($query);
			$publishingDates = $resultSet->getFacetSet()->getFacet('publishingDates');
			$publishingDates_array = [];
			foreach ($publishingDates as $key => $value) {
				$publishingDates_array[] = $key;
			}
			$dates_collection = collect($publishingDates_array);

			return $dates_collection->sortDesc()->values();
		} catch(\Solarium\Exception $e) {
			Log::error('Error en Solr [getPublishingDates]: ' . $e->getMessage());
			// Retornar colección vacía para que la vista no falle al iterar
            return collect();
		} catch (Throwable $e) {
			// Atrapa fallos críticos de red, Timeouts de cURL, errores de DNS o conexión caída
			Log::error('Fallo de conexión o Timeout con Solr en [getPublishingDates]: ' . $e->getMessage());
			return collect(); 
		}
	}

	public function cleanInputSearchTerm($searchTerm) {
		$searchTerm = trim($searchTerm);
		$searchTerm = str_replace(":", "\:", $searchTerm);
		// $strQuery = "(title_local_s:\"$searchTerm\")";
		// The empty searching
		// if ($searchTerm == "") {
		// 	$strQuery = "*:*";
		// } else {
		// 	// The user wrote a searching term
		// 	$strQuery = '(title_local_s:"' . $searchTerm . '" OR description_local_s:"' . $searchTerm . '"';
		// 	$strQuery .= ' OR subjects_t:"' . $searchTerm . '" OR authors_t:"' . $searchTerm . '"';
		// } 
		return $strQuery;
	}

	public function getNumDocsFound() {
		try {
			// get a select query instance
			$query = $this->client->createQuery($this->client::QUERY_SELECT);
			// this executes the query and returns the result
			$resultset = $this->client->execute($query);
			// display the total number of documents found by Solr
			return $resultset->getNumFound();
		} catch (\Solarium\Exception $e) {
			Log::error('Error en Solr [getNumDocsFound]: ' . $e->getMessage());
            
            // Retornar 0 para evitar fallos numéricos en la interfaz
            return 0;
		} catch (Throwable $e) {
			// Atrapa fallos críticos de red, Timeouts de cURL, errores de DNS o conexión caída
			Log::error('Fallo de conexión o Timeout con Solr en [getNumDocsFound]: ' . $e->getMessage());
			return 0; 
		}
	}

}