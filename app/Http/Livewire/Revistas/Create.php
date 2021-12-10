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

class Create extends Component {

	use WithPagination;

	public $currentStep = 1;
	public $titulo, $descripcion, $issn, $issne, $ojs_ruta, $anio_inicio, $otros_indices,
	$situacion, $arbitrada, $tipo_revista, $soporte, $id_area_conocimiento,
	$id_frecuencia, $id_subsistema, $indicador;
	public $successMessage = '';

	public $frecuencias, $subsistemas, $editoriales, $areas_conocimiento, $idiomas, $indexadores;
	public $selected_editoriales = [], $selected_entidades = [], $selected_idiomas = [], $selected_temas = [], $selected_responsables = [], $selected_indices = [];

	// Propiedades para el responsable
	public $id_responsable, $grado, $nombres, $apellidos, $correo_electronico, $telefonos, $role;

	protected $listeners = ['say-hello' => 'sayHello'];

	// Establecer que estilo utilizar para los enlaces de paginación
	protected $paginationTheme = 'bootstrap';

	public $searchTerm, $searchTermEntidad, $searchTermTema;

	public function sayHello() {

	}

	public function mount() {
		$this->areas_conocimiento = AreasConocimiento::all();
		$this->frecuencias = Frecuencia::all();
		$this->subsistemas = Subsistema::all();
		$this->editoriales = Editorial::all()->sortBy('nombre');
		// $this->entidades = EntidadEditora::all()->sortBy('nombre');
		$this->idiomas = Idioma::all()->sortBy('nombre');
		// $this->temas = Tema::all()->sortBy('nombre');
		$this->indexadores = SistemaIndexador::all();
		// $this->responsables = Responsable::paginate(15);
		// $this->selected_responsables = collect([]);

	}

	public function render() {
		// return view('livewire.revistas.create', [
		// 	'responsables' => Responsable::orderBy('nombres')->paginate(15),
		// ]);

		return view('livewire.revistas.create', [
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
		$this->scrollOnFail('.alert', function () {
			$validatedData = $this->validate([
				'titulo' => ['required', 'max:256'],
				'descripcion' => ['required'],
				'issn' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/u'],
				'issne' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/u'],
				'ojs_ruta' => ['nullable', 'url'],
				'anio_inicio' => ['required', 'integer'],
				'arbitrada' => ['required', 'in:Si,No'],
				//'soporte' => ['required', 'in:Ambas,Electrónica,Impresa'],
				'soporte' => ['required', 'in:Digital,Impreso,Ambas'],
				'situacion' => ['required', 'in:Vigente,Descontinuada'],
				'tipo_revista' => ['required', 'in:Cultural,Divulgación,Investigación,Técnico-Profesional'],
				'id_frecuencia' => ['required', 'numeric'],
				'id_area_conocimiento' => ['required', 'numeric'],
				'id_subsistema' => ['required', 'numeric'],
				// 'otros_indices' => ['nullable'],
				'indicador' => ['nullable'],
			]);
			$this->dispatchBrowserEvent('myownapp:scroll-to', [
				'query' => '.stepwizard',
				// 'query' => '#step-1',
			]);
			$this->currentStep = 2;
		});
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

	/**
	 * Función para validar que se haya seleccionado por lo menos un idioma y un tema
	 *
	 */

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

	public function submitForm() {
		//dd($this);
		$revista = Revista::create([
			'titulo' => $this->titulo,
			'descripcion' => $this->descripcion,
			'issn' => $this->issn,
			'issne' => $this->issne,
			'anio_inicio' => $this->anio_inicio,
			// 'otros_indices' => $this->otros_indices,
			'ojs_ruta' => $this->ojs_ruta,
			'arbitrada' => $this->arbitrada,
			'soporte' => $this->soporte,
			'situacion' => $this->situacion,
			'tipo_revista' => $this->tipo_revista,
			'id_area_conocimiento' => $this->id_area_conocimiento,
			'id_frecuencia' => $this->id_frecuencia,
			'id_subsistema' => $this->id_subsistema,
			'indicador' => $this->indicador,
		]);

		$responsables = $this->selected_responsables;
		foreach ($responsables as $responsable) {
			$revista->responsables()->attach($responsable['responsable']['id'], [
				'orden' => key($responsables) + 1,
				'cargo' => $responsable['role']]);
			next($responsables);
		}

		$editoriales = $this->selected_editoriales;
		foreach ($editoriales as $editorial) {
			// $editorial = Editorial::findOrFail($id_editorial);
			//dump($editorial);
			//dump(key($editoriales) + 1);
			$revista->editoriales()->attach($editorial['id'], ['orden' => key($editoriales) + 1]);
			next($editoriales);
		}

		$entidades = $this->selected_entidades;
		foreach ($entidades as $entidad) {
			// $entidad = EntidadEditora::findOrFail($id_entidad);
			$revista->entidades_editoras()->attach($entidad['id'], ['orden' => key($entidades) + 1]);
			next($entidades);
		}

		$idiomas = $this->selected_idiomas;
		foreach ($idiomas as $idioma) {
			// $idioma = Idioma::findOrFail($id_idioma);
			$revista->idiomas()->attach($idioma['id'], ['orden' => key($idiomas) + 1]);
			next($idiomas);
		}

		$temas = $this->selected_temas;
		foreach ($temas as $tema) {
			// $tema = Tema::findOrFail($id_tema);
			$revista->temas()->attach($tema['id'], ['orden' => key($temas) + 1]);
			next($temas);
		}

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

		$this->successMessage = "Revista {$this->titulo} fue creada exitosamente";
		$this->clearForm();
		$this->currentStep = 1;
		session()->flash('success', "La nueva revista  \"{$revista->titulo}\" fue creada.");
		return redirect()
			->route('revistas.index');
	}

	public function back($step) {
		$this->currentStep = $step;
	}

	public function clearForm() {
		$this->titulo = '';
		$this->descripcion = '';
		$this->issn = '';
		$this->issne = '';
		$this->anio_inicio = '';
		$this->otros_indices = '';
		$this->indicador = '';
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
