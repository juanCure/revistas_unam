<?php

namespace App\Services;

class SolrService {

	protected $client;

	public function __construct(\Solarium\Client $client) {
		$this->client = $client;
	}

	public function getHarvestedJournals() {
		$query = $this->client->createSelect();
		$facetSet = $query->getFacetSet();
		$facetSet->createFacetField('journals')->setField('collection');
		$resultSet = $this->client->select($query);
		$journals = $resultSet->getFacetSet()->getFacet('journals');
		$journalsArray = [];
		foreach ($journals as $key => $value) {
			$journalsArray[] = $key;
		}
		$journals_collection = collect($journalsArray);
		return $journals_collection->sort()->values()->all();
	}

	public function getPublishingDates() {
		$query = $this->client->createSelect();
		$facetSet = $query->getFacetSet();
		$facetSet->createFacetField('publishingDates')->setField('publishDate');
		$query->addSort('publishDate', $query::SORT_DESC);
		$resultSet = $this->client->select($query);
		$publishingDates = $resultSet->getFacetSet()->getFacet('publishingDates');
		$publishingDates_array = [];
		foreach ($publishingDates as $key => $value) {
			$publishingDates_array[] = $key;
		}
		$dates_collection = collect($publishingDates_array);

		return $dates_collection->sortDesc()->values()->all();
	}

	public function cleanInputSearchTerm($searchTerm) {
		$searchTerm = trim($searchTerm);
		$searchTerm = str_replace(":", "\:", $searchTerm);
		//$strQuery = "title:" . $searchTerm;
		$strQuery = "(title:/[A-Z]*" . $searchTerm . "[A-Z]*/)";
		if($searchTerm == "") {
			$strQuery = "*:*";
		}
		return $strQuery;
	}

	public function getNumDocsFound() {
		// get a select query instance
		$query = $this->client->createQuery($this->client::QUERY_SELECT);

		// this executes the query and returns the result
		$resultset = $this->client->execute($query);

		// display the total number of documents found by Solr
		return $resultset->getNumFound();
	}

}