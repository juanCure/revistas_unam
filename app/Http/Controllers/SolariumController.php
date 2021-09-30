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
	public function busqueda(Request $request) {

		$palabra = $request->input('buscar');
		$idMod = $request->input('idMod');

		$palabra = trim($palabra);
		//Solr no permite caracteres especiales, por eso hay que escaparlos
		$palabra = str_replace(":", "\:", $palabra);

		// Si se busca por Articulo, se hace la petición al SOLR del servidor 132.248.204.81
		// si la busqueda es por revista, entonces la busqueda se realiza a la base de datos
		// revistas_unam_normalizada_laravel
		if (isset($idMod) && $idMod == 0) {
			// dump("Estoy en la busqueda por artículo");
			// echo "Se debe buscar en solr";
			//se elige el endpoint del que queremos consumir
			$this->client->setDefaultEndPoint('biblio');
			//Se incrementa a 10s el timeout para que no se rechaze la conexion
			// $this->client->setAdapter('Solarium\Core\Client\Adapter\Curl');
			// $this->client->getAdapter()->setTimeout(18);

			$query = $this->client->createSelect();
			// $perPage = $query->getRows();
			$perPage = 25;
			$startPage = $query->getStart();
			$page = max(0, Paginator::resolveCurrentPage());
			$offset = ($page * $perPage) - $perPage;

			$strQuery = "(title:/[A-Z]*" . $palabra . "[A-Z]*/)";

			$query->setQuery($strQuery);
			$query->setStart($offset)->setRows($perPage);
			$resultset = $this->client->select($query);
			$numRevistas = $resultset->getNumFound();

			// dump(gettype($resultset));

			$numRevistas = $resultset->getNumFound();

			$revistas = $this->procesaResultados($resultset);
			$mypaginator = $this->paginate($revistas, $numRevistas, $perPage, $page, $palabra);

			//Se regresan a la normalidad los caracteres escapados
			$palabra = str_replace("\:", ":", $palabra);

			return view('resultados.bSolrArtRes', compact('revistas', 'numRevistas', 'palabra', 'idMod', 'mypaginator'));

		} else {
			// dump("Estoy en la busqueda por revista");
			// echo "Se debe buscar en la base de datos del proyecto de laravel";
			$indices = $this->indicesServicio->getIndices();

			$alfabeto = $this->indicesServicio->getAlfabeto();

			return view('resultados.resultadosPorIndices', [
				'revistas' => Revista::where('titulo', 'like', '%' . $palabra . '%')->paginate(5),
				'tipos_revistas' => $indices['typos'],
				'areas_conocimiento' => $indices['areas'],
				'indexadores' => $indices['indexadores'],
				'alfabeto' => $alfabeto,
				'accion' => 'Busqueda básica',
				'filtro' => $palabra,
				'breadcrumb' => 'Busqueda básica',
				'idMod' => $idMod,
			]);
		}

	}

	/**
	 *   Procesa la respuesta de Solr para poder extraer
	 *   los datos mas facilmente en la vista
	 **/
	public function procesaResultados($resulset) {

		$revistas = collect();

		foreach ($resulset as $document) {
			// Se itera sobre el documento para acceder a cada campo
			$item = [];
			foreach ($document as $field => $value) {

				// Si el campo tiene varios valores se transforma el array a cadena
				// y se eliminan los valores duplicados
				// if (is_array($value)) {

				// 	if ($field == "nombre_tema" || $field == "nom_subtema") {
				// 		$value = array_unique($value);
				// 	}

				// 	if ($field == "es_enlinea") {
				// 		$value[0] = ($value[0] == "true") ? '1' : '0';
				// 	}

				// 	$value = implode(', ', $value);

				// }

				// $item[$field] = $value;
				//
				// this converts multivalue fields to a comma-separated string
				if (is_array($value)) {
					$value = implode(', ', $value);
				}
				$item[$field] = $value;
			}

			$revistas->push($item);
		}

		return $revistas;
	}

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	public function paginate($items, $resultset_total, $perPage, $page, $query) {
		// $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
		$items = $items instanceof Collection ? $items : Collection::make($items);
		$options = [
			'page' => $page,
			'path' => Paginator::resolveCurrentPath(),
			'query' => [
				'buscar' => $query,
				'idMod' => 0,
			],
		];
		return new LengthAwarePaginator($items, $resultset_total, $perPage, $page, $options);
	}
}
