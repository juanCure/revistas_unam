<?php

namespace App\Exports;

use App\Services\IndicesServicio;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RevistasExport implements FromQuery, WithMapping, WithHeadings {
	use Exportable;

	// public function __construct($tipo) {
	// 	$this->tipo = $tipo;
	// }

	public function __construct(Request $request, IndicesServicio $indicesServicio) {
		$this->request = $request;
		$this->indicesServicio = $indicesServicio;
	}

	public function headings(): array{
		return [
			'Título',
			'Situación',
			'Arbitrada',
			'Tipo de publicación',
			'Área del conocimiento',
			'Año de Inicio',
			'Frecuencia',
			'Soporte',
			'Idiomas',
			'ISSN',
			'ISSN Electrónico',
			'Editoriales',
			'Entidades Editoras',
			'Subsistema',
			'Principales Índices',
			'Ruta',
			'Ruta Alterna',
		];
	}
	/**
	 * @return \Illuminate\Support\Collection
	 */
	// public function collection() {
	// 	return Revista::all();
	// }

	public function query() {
		$revistas = $this->indicesServicio->getRevistas($this->request);
		return $revistas;
	}

	/**
	 * @var Invoice $invoice
	 */
	public function map($revista): array
	{
		return [
			$revista->titulo,
			$revista->situacion,
			$revista->arbitrada,
			$revista->tipo_revista,
			$revista->area_conocimiento->nombre,
			$revista->anio_inicio,
			$revista->frecuencia->nombre,
			($revista->soporte == "Ambas") ? "Digital e impreso" : $revista->soporte,
			$revista->idiomas->implode("nombre", " | "),
			(is_null($revista->issn)) ? "En trámite" : $revista->issn,
			(is_null($revista->issne)) ? "En trámite" : $revista->issne,
			$revista->editoriales->implode("nombre", " | "),
			$revista->entidades_editoras->implode("nombre", " | "),
			$revista->subsistema->nombre,
			$revista->sistemas_indexadores->implode("nombre", " | "),
			$revista->ojs_ruta,
			$revista->ruta_alterna,
		];
	}
}
