<?php

return [
	'endpoint' => [
		'biblio' => [
			// 'host' => env('SOLR_HOST', '132.248.204.81'),
			'host' => env('SOLR_HOST', '132.248.204.101'),
			'port' => env('SOLR_PORT', '8983'),
			'path' => env('SOLR_PATH', ''),
			'core' => env('SOLR_CORE', 'biblio'),
		],
	],
];
