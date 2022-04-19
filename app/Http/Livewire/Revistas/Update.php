<?php

namespace App\Http\Livewire\Revistas;

use App\Models\AreasConocimiento;
use App\Models\Editorial;
use App\Models\EntidadEditora;
use App\Models\Frecuencia;
use App\Models\Idioma;
use App\Models\Responsable;
use App\Models\Revista;
use App\Models\SistemaIndexador;
use App\Models\Subsistema;
use App\Models\Tema;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Update extends Component {

	use WithPagination;

	public $currentStep = 1, $id_revista;
	public $titulo, $descripcion, $issn, $issne, $ojs_ruta, $anio_inicio, $otros_indices,
	$situacion, $arbitrada, $tipo_revista, $soporte, $id_area_conocimiento,
	$id_frecuencia, $id_subsistema, $indicador;
	public $successMessage = '';

	public $frecuencias, $subsistemas, $editoriales, $areas_conocimiento, $idiomas, $indexadores;
	public $selected_editoriales = [], $selected_entidades = [], $selected_idiomas = [], $selected_temas = [],
	$selected_responsables = [], $selected_indices = [];

	// Propiedades para el responsable
	public $id_responsable, $grado, $nombres, $apellidos, $correo_electronico, $telefonos, $role;

	// Establecer que estilo utilizar para los enlaces de paginación
	protected $paginationTheme = 'bootstrap';

	public $searchTerm, $searchTermEntidad, $searchTermTema;

	public $updateMode = true;

	public function mount($revista) {

		// Establecer valores en el modelo
		$this->id_revista = $revista->id_revista;
		$this->titulo = $revista->titulo;
		$this->descripcion = $revista->descripcion;
		$this->issn = $revista->issn;
		$this->issne = $revista->issne;
		$this->ojs_ruta = $revista->ojs_ruta;
		$this->anio_inicio = $revista->anio_inicio;
		$this->otros_indices = $revista->otros_indices;
		$this->situacion = $revista->situacion;
		$this->arbitrada = $revista->arbitrada;
		$this->tipo_revista = $revista->tipo_revista;
		$this->soporte = $revista->soporte;
		$this->id_area_conocimiento = $revista->id_area_conocimiento;
		$this->id_frecuencia = $revista->id_frecuencia;
		$this->id_subsistema = $revista->id_subsistema;
		$this->areas_conocimiento = AreasConocimiento::all();
		$this->frecuencias = Frecuencia::all();
		$this->subsistemas = Subsistema::all();
		$this->editoriales = Editorial::all()->sortBy('nombre');
		$this->idiomas = Idioma::all()->sortBy('nombre');
		$this->indicador = $revista->indicador;
		$this->indexadores = SistemaIndexador::all()->sortBy('nombre');

		// Estableciendo los valores de $selected_responsables
		foreach ($revista->responsables as $responsable) {
			$collection_responsable = [
				'responsable' => $responsable,
				'role' => $responsable->pivot->cargo,
			];
			$this->selected_responsables[] = $collection_responsable;
		}

		// Estableciendo los valores para las editoriales seleccionadas
		foreach ($revista->editoriales as $editorial) {
			$collection_editorial = [
				'id' => $editorial->id,
				'nombre' => $editorial->nombre,
			];

			$this->selected_editoriales[] = $collection_editorial;
		}
		// Estableciendo los valores para las entidades editoras seleccionadas
		foreach ($revista->entidades_editoras as $entidad) {
			$collection_entidad = [
				'id' => $entidad->id,
				'nombre' => $entidad->nombre,
			];

			$this->selected_entidades[] = $collection_entidad;
		}
		// Estableciendo los valores para los idiomas seleccionados previamente
		foreach ($revista->idiomas as $idioma) {
			$collection_idioma = [
				'id' => $idioma->id,
				'nombre' => $idioma->nombre,
			];

			$this->selected_idiomas[] = $collection_idioma;
		}
		// Estableciendo los valores para los temas seleccionados previamente
		foreach ($revista->temas as $tema) {
			$collection_tema = [
				'id' => $tema->id,
				'nombre' => $tema->nombre,
			];

			$this->selected_temas[] = $collection_tema;
		}

		// Estableciendo los valores para los indices seleccionados previamente
		foreach ($revista->sistemas_indexadores as $indice) {
			$collection_indice = [
				'id' => $indice->id,
				'nombre' => $indice->nombre,
			];

			$this->selected_indices[] = $collection_indice;
		}
	}

	public function render() {
		$this->dispatchBrowserEvent('myownapp:scroll-to', [
			'query' => '.alert',
		]);
		return view('livewire.revistas.update', [
			'responsables' => Responsable::where(function ($sub_query) {
				$sub_query->where(DB::raw('CONCAT_WS(" ", grado, nombres, apellidos)'), 'like', '%' . $this->searchTerm . '%');
			})->paginate(15),
			'entidades' => EntidadEditora::where(function ($sub_query) {
				$sub_query->where('nombre', 'like', '%' . $this->searchTermEntidad . '%');
			})->paginate(10),
			'temas' => Tema::where(function ($sub_query) {
				$sub_query->where('nombre', 'like', '%' . $this->searchTermTema . '%');
			})->paginate(10),
		]);

	}

	public function firstStepSubmit() {
		// Validando los datos que serán agregados en la tabla principal de revistas
		$validatedData = $this->validate([
			'titulo' => ['required', 'max:256'],
			'descripcion' => ['required'],
			'issn' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/u'],
			'issne' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/u'],
			'ojs_ruta' => ['nullable', 'url'],
			'anio_inicio' => ['required', 'integer'],
			'arbitrada' => ['required', 'in:Si,No'],
			'soporte' => ['required', 'in:Digital,Impreso,Ambas'],
			'situacion' => ['required', 'in:Vigente,Descontinuada'],
			'tipo_revista' => ['required', 'in:Cultural,Divulgación,Investigación,Técnico-Profesional'],
			'id_frecuencia' => ['required', 'numeric'],
			'id_area_conocimiento' => ['required', 'numeric'],
			'id_subsistema' => ['required', 'numeric'],
			'otros_indices' => ['nullable'],
			'indicador' => ['nullable'],
		]);
		$this->dispatchBrowserEvent('myownapp:scroll-to', [
			// 'query' => '#step-2',
			'query' => '.stepwizard',
		]);
		$this->currentStep = 2;
	}

	/**
	 * Función para validar que se haya seleccionado por lo menos un usuario responsable de la revista
	 *
	 */

	public function secondStepSubmit() {
		$this->scrollOnFail('.alert', function () {
			$validatedData = $this->validate([
				'selected_responsables' => ['required', 'array', 'min:1'],
			]);
			$this->dispatchBrowserEvent('myownapp:scroll-to', [
				'query' => '.stepwizard',
			]);
			$this->currentStep = 3;
		});
	}

	// public function secondStepSubmit() {
	// 	// Validando los datos asociados a las editoriales
	// 	$validatedData = $this->validate([
	// 		'selected_editoriales' => ['required', 'array', 'min:1'],
	// 		'selected_editoriales.*' => ['required', 'numeric', 'distinct'],
	// 		'selected_entidades' => ['required', 'array', 'min:1'],
	// 		'selected_entidades.*' => ['required', 'numeric', 'distinct'],
	// 	]);
	// 	$this->dispatchBrowserEvent('myownapp:scroll-to', [
	// 		// 'query' => '#step-2',
	// 		'query' => '.stepwizard',
	// 	]);
	// 	$this->currentStep = 3;
	// }

	// public function thirdStepSubmit() {
	// 	$validatedData = $this->validate([
	// 		'selected_idiomas' => ['required', 'array', 'min:1'],
	// 		'selected_idiomas.*' => ['required', 'numeric', 'distinct'],
	// 		'selected_temas' => ['required', 'array', 'min:1'],
	// 		'selected_temas.*' => ['required', 'numeric', 'distinct'],
	// 	]);
	// 	$this->dispatchBrowserEvent('myownapp:scroll-to', [
	// 		// 'query' => '#step-2',
	// 		'query' => '.stepwizard',
	// 	]);
	// 	$this->currentStep = 4;
	// }

	/**
	 * Función para validar que se haya seleccionado por lo menos una editorial y una entidad editora
	 *
	 */

	public function thirdStepSubmit() {
		// Validando los datos asociados a las editoriales y la entidades académicas
		$this->scrollOnFail('.alert', function () {
			$validatedData = $this->validate([
				'selected_editoriales' => ['required', 'array', 'min:1'],
				// 'selected_editoriales.*' => ['required', 'numeric', 'distinct'],
				'selected_entidades' => ['required', 'array', 'min:1'],
				// 'selected_entidades.*' => ['required', 'numeric', 'distinct'],
			]);
			$this->dispatchBrowserEvent('myownapp:scroll-to', [
				'query' => '.stepwizard',
			]);
			$this->currentStep = 4;
		});
	}

	public function fourthStepSubmit() {
		$this->scrollOnFail('.alert', function () {
			$validatedData = $this->validate([
				'selected_idiomas' => ['required', 'array', 'min:1'],
				// 'selected_idiomas.*' => ['required', 'numeric', 'distinct'],
				'selected_temas' => ['required', 'array', 'min:1'],
				// 'selected_temas.*' => ['required', 'numeric', 'distinct'],
			]);
			$this->dispatchBrowserEvent('myownapp:scroll-to', [
				'query' => '.stepwizard',
			]);
			$this->currentStep = 5;
		});

	}

	public function fifthStep() {
		$this->scrollOnFail('.alert', function () {
			$validatedData = $this->validate([
				'selected_indices' => ['nullable', 'array', 'min:0'],
				'otros_indices' => ['nullable'],
			]);
			$this->dispatchBrowserEvent('myownapp:scroll-to', [
				'query' => '.stepwizard',
			]);
			$this->currentStep = 6;
		});
	}

	public function myUpdate() {
		$revista = Revista::findOrFail($this->id_revista);
		$revista->update([
			'titulo' => $this->titulo,
			'descripcion' => $this->descripcion,
			'anio_inicio' => $this->anio_inicio,
			'issn' => $this->issn,
			'issne' => $this->issne,
			'arbitrada' => $this->arbitrada,
			'soporte' => $this->soporte,
			'situacion' => $this->situacion,
			'tipo_revista' => $this->tipo_revista,
			'otros_indices' => $this->otros_indices,
			//'imagen' => $this->,
			'ojs_ruta' => $this->ojs_ruta,
			'id_frecuencia' => $this->id_frecuencia,
			'id_area_conocimiento' => $this->id_area_conocimiento,
			'id_subsistema' => $this->id_subsistema,
			'indicador' => $this->indicador,
		]);

		$revista->responsables()->detach();
		$responsables = $this->selected_responsables;
		foreach ($responsables as $responsable) {
			$revista->responsables()->attach($responsable['responsable']['id'], [
				'orden' => key($responsables) + 1,
				'cargo' => $responsable['role']]);
			next($responsables);
		}
		$revista->editoriales()->detach();
		$editoriales = $this->selected_editoriales;
		foreach ($editoriales as $editorial) {
			// $editorial = Editorial::findOrFail($id_editorial);
			//dump($editorial);
			//dump(key($editoriales) + 1);
			$revista->editoriales()->attach($editorial['id'], ['orden' => key($editoriales) + 1]);
			next($editoriales);
		}
		$revista->entidades_editoras()->detach();
		$entidades = $this->selected_entidades;
		foreach ($entidades as $entidad) {
			// $entidad = EntidadEditora::findOrFail($id_entidad);
			$revista->entidades_editoras()->attach($entidad['id'], ['orden' => key($entidades) + 1]);
			next($entidades);
		}
		$revista->idiomas()->detach();
		$idiomas = $this->selected_idiomas;
		foreach ($idiomas as $idioma) {
			// $idioma = Idioma::findOrFail($id_idioma);
			$revista->idiomas()->attach($idioma['id'], ['orden' => key($idiomas) + 1]);
			next($idiomas);
		}
		$revista->temas()->detach();
		$temas = $this->selected_temas;
		foreach ($temas as $tema) {
			// $tema = Tema::findOrFail($id_tema);
			$revista->temas()->attach($tema['id'], ['orden' => key($temas) + 1]);
			next($temas);
		}
		$revista->sistemas_indexadores()->detach();
		$indices = $this->selected_indices;
		foreach ($indices as $indice) {
			$revista->sistemas_indexadores()->attach($indice['id'], ['orden' => key($indices) + 1]);
			next($indices);
		}

		if ($this->otros_indices != '') {
			$revista->update([
				'otros_indices' => $this->otros_indices,
			]);
		}

		// // Actualizando las editoriales asociadas de la revista
		// $revista->editoriales()->detach();
		// foreach ($this->selected_editoriales as $id_editorial) {
		// 	//dump($id_editorial);
		// 	$editorial = Editorial::findOrFail($id_editorial);
		// 	$revista->editoriales()->attach($editorial->id, ['orden' => key($this->selected_editoriales) + 1]);
		// 	next($this->selected_editoriales);
		// }

		// // Actualizando las entidades editoras asociadas de la revista
		// $revista->entidades_editoras()->detach();
		// foreach ($this->selected_entidades as $id_entidad) {
		// 	//dump($id_editorial);
		// 	$entidad = EntidadEditora::findOrFail($id_entidad);
		// 	$revista->entidades_editoras()->attach($entidad->id, ['orden' => key($this->selected_entidades) + 1]);
		// 	next($this->selected_entidades);
		// }

		// // Actualizando los idiomas asociados de la revista
		// $revista->idiomas()->detach();
		// foreach ($this->selected_idiomas as $id_idioma) {
		// 	//dump($id_editorial);
		// 	$idioma = Idioma::findOrFail($id_idioma);
		// 	$revista->idiomas()->attach($idioma->id, ['orden' => key($this->selected_idiomas) + 1]);
		// 	next($this->selected_idiomas);
		// }

		// // Actualizando los temas asociadas de la revista
		// $revista->temas()->detach();
		// foreach ($this->selected_temas as $id_tema) {
		// 	//dump($id_editorial);
		// 	$tema = Tema::findOrFail($id_tema);
		// 	$revista->temas()->attach($tema->id, ['orden' => key($this->selected_temas) + 1]);
		// 	next($this->selected_temas);
		// }

		//$this->successMessage = "Revista {$this->titulo} ha sido editada con éxito!";
		session()->flash('success', "La revista \"{$revista->titulo}\" fue editada con éxito!");
		return redirect()
			->route('revistas.index');
	}

	public function back($step) {
		$this->currentStep = $step;
	}

	public function modalRolResponsable($id) {
		$responsable = Responsable::findOrFail($id);
		$this->id_responsable = $id;
		$this->grado = $responsable->grado;
		$this->nombres = $responsable->nombres;
		$this->apellidos = $responsable->apellidos;
		$this->correo_electronico = $responsable->correo_electronico;
		$this->telefonos = $responsable->telefonos;
		$this->role = '';

	}

	public function agregarResponsable($id) {
		$validatedData = $this->validate([
			'grado' => 'nullable',
			'nombres' => 'required',
			'apellidos' => 'required',
			'correo_electronico' => 'nullable|email',
			'telefonos' => 'nullable',
			'role' => 'required',
		]);

		$responsable = Responsable::find($id);
		$responsable->update([
			'grado' => $this->grado,
			'nombres' => $this->nombres,
			'apellidos' => $this->apellidos,
			'correo_electronico' => $this->correo_electronico,
			'telefonos' => $this->telefonos,
		]);

		// $collection_responsable = collect([
		// 	'responsable' => $responsable,
		// 	'role' => $this->role,
		// ]);

		$collection_responsable = [
			'responsable' => $responsable,
			'role' => $this->role,
		];

		// array_push($this->selected_responsables, $collection_responsable);
		$this->selected_responsables[] = $collection_responsable;
		// $this->selected_responsables->push($collection_responsable);
		$this->resetResponsableModalFields();
		$this->emit('responsableAgregado');
	}

	public function resetResponsableModalFields() {
		$this->grado = '';
		$this->nombres = '';
		$this->apellidos = '';
		$this->correo_electronico = '';
		$this->telefonos = '';
		$this->role = '';
	}

	public function agregarIndice($id) {
		$indice = SistemaIndexador::findOrFail($id);
		$collection_indice = [
			'id' => $indice->id,
			'nombre' => $indice->nombre,
		];
		$this->selected_indices[] = $collection_indice;
	}

	public function quitarResponsable($index) {
		unset($this->selected_responsables[$index]);
		$this->selected_responsables = array_values($this->selected_responsables);
	}

	public function quitarIndice($index) {
		unset($this->selected_indices[$index]);
		$this->selected_indices = array_values($this->selected_indices);
	}

	public function agregarEditorial($id) {
		$editorial = Editorial::findOrFail($id);
		$collection_editorial = [
			'id' => $id,
			'nombre' => $editorial->nombre,
		];

		$this->selected_editoriales[] = $collection_editorial;
	}

	public function quitarEditorial($index) {
		unset($this->selected_editoriales[$index]);
		$this->selected_editoriales = array_values($this->selected_editoriales);
	}

	public function agregarEntidad($id) {
		$entidad = EntidadEditora::findOrFail($id);
		$collection_entidad = [
			'id' => $id,
			'nombre' => $entidad->nombre,
		];

		$this->selected_entidades[] = $collection_entidad;
	}

	public function quitarEntidad($index) {
		unset($this->selected_entidades[$index]);
		$this->selected_entidades = array_values($this->selected_entidades);
	}

	public function agregarIdioma($id) {
		$idioma = Idioma::findOrFail($id);
		$collection_idioma = [
			'id' => $id,
			'nombre' => $idioma->nombre,
		];

		$this->selected_idiomas[] = $collection_idioma;
	}

	public function quitarIdioma($index) {
		unset($this->selected_idiomas[$index]);
		$this->selected_idiomas = array_values($this->selected_idiomas);
	}

	public function agregarTema($id) {
		$tema = Tema::findOrFail($id);
		$collection_tema = [
			'id' => $id,
			'nombre' => $tema->nombre,
		];

		$this->selected_temas[] = $collection_tema;
	}

	public function quitarTema($index) {
		unset($this->selected_temas[$index]);
		$this->selected_temas = array_values($this->selected_temas);
	}
}
