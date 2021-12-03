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
		$journalArray = [];
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

}