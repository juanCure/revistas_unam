<?php

return [
	'endpoint' => [
		'biblio' => [
			'host' => env('SOLR_HOST', '192.0.2.1'),
			'port' => env('SOLR_PORT', '8983'),
			'path' => env('SOLR_PATH', ''),
			'core' => env('SOLR_CORE', 'biblio'),
		],
	],
];
