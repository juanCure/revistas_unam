<?php

namespace App\Http\Livewire\Revistas;

use App\Models\AreasConocimiento;
use App\Models\Editorial;
use App\Models\EntidadEditora;
use App\Models\Frecuencia;
use App\Models\Idioma;
use App\Models\Revista;
use App\Models\Subsistema;
use App\Models\Tema;
use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component {

	use WithPagination;

	public $currentStep = 1;
	public $titulo, $descripcion, $issn, $issne, $anio_inicio, $otros_indices,
	$situacion, $arbitrada, $tipo_revista, $soporte, $id_area_conocimiento,
	$id_frecuencia, $id_subsistema, $indicador;
	public $successMessage = '';

	public $frecuencias, $subsistemas, $editoriales, $areas_conocimiento, $entidades, $idiomas, $temas;
	public $selected_editoriales = [], $selected_entidades = [], $selected_idiomas = [], $selected_temas = [];

	protected $listeners = ['say-hello' => 'sayHello'];

	public function sayHello() {

	}

	public function mount() {
		$this->areas_conocimiento = AreasConocimiento::all();
		$this->frecuencias = Frecuencia::all();
		$this->subsistemas = Subsistema::all();
		$this->editoriales = Editorial::all()->sortBy('nombre');
		$this->entidades = EntidadEditora::all()->sortBy('nombre');
		$this->idiomas = Idioma::all()->sortBy('nombre');
		$this->temas = Tema::all()->sortBy('nombre');

	}

	public function render() {
		return view('livewire.revistas.create');
	}

	public function firstStepSubmit() {
		// Validando los datos que serán agregados en la tabla principal de revistas
		$this->scrollOnFail('.alert', function () {
			$validatedData = $this->validate([
				'titulo' => ['required', 'max:256'],
				'descripcion' => ['required'],
				'issn' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/u'],
				'issne' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/u'],
				'anio_inicio' => ['required', 'integer'],
				'arbitrada' => ['required', 'in:Si,No'],
				//'soporte' => ['required', 'in:Ambas,Electrónica,Impresa'],
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
				'query' => '.stepwizard',
			]);
			$this->currentStep = 2;
		});
	}

	public function secondStepSubmit() {
		// Validando los datos asociados a las editoriales
		$this->scrollOnFail('.alert', function () {
			$validatedData = $this->validate([
				'selected_editoriales' => ['required', 'array', 'min:1'],
				'selected_editoriales.*' => ['required', 'numeric', 'distinct'],
				'selected_entidades' => ['required', 'array', 'min:1'],
				'selected_entidades.*' => ['required', 'numeric', 'distinct'],
			]);
			$this->dispatchBrowserEvent('myownapp:scroll-to', [
				'query' => '.stepwizard',
			]);
			$this->currentStep = 3;
		});
	}

	public function thirdStepSubmit() {
		$this->scrollOnFail('.alert', function () {
			$validatedData = $this->validate([
				'selected_idiomas' => ['required', 'array', 'min:1'],
				'selected_idiomas.*' => ['required', 'numeric', 'distinct'],
				'selected_temas' => ['required', 'array', 'min:1'],
				'selected_temas.*' => ['required', 'numeric', 'distinct'],
			]);
			$this->dispatchBrowserEvent('myownapp:scroll-to', [
				'query' => '.stepwizard',
			]);
			$this->currentStep = 4;
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
			'otros_indices' => $this->otros_indices,
			'arbitrada' => $this->arbitrada,
			'soporte' => $this->soporte,
			'situacion' => $this->situacion,
			'tipo_revista' => $this->tipo_revista,
			'id_area_conocimiento' => $this->id_area_conocimiento,
			'id_frecuencia' => $this->id_frecuencia,
			'id_subsistema' => $this->id_subsistema,
			'indicador' => $this->indicador,
		]);

		$editoriales = $this->selected_editoriales;
		foreach ($editoriales as $id_editorial) {
			$editorial = Editorial::findOrFail($id_editorial);
			//dump($editorial);
			//dump(key($editoriales) + 1);
			$revista->editoriales()->attach($editorial->id, ['orden' => key($editoriales) + 1]);
			next($editoriales);
		}

		$entidades = $this->selected_entidades;
		foreach ($entidades as $id_entidad) {
			$entidad = EntidadEditora::findOrFail($id_entidad);
			$revista->entidades_editoras()->attach($entidad->id, ['orden' => key($entidades) + 1]);
			next($entidades);
		}

		$idiomas = $this->selected_idiomas;
		foreach ($idiomas as $id_idioma) {
			$idioma = Idioma::findOrFail($id_idioma);
			$revista->idiomas()->attach($idioma->id, ['orden' => key($idiomas) + 1]);
			next($idiomas);
		}

		$temas = $this->selected_temas;
		foreach ($temas as $id_tema) {
			$tema = Tema::findOrFail($id_tema);
			$revista->temas()->attach($tema->id, ['orden' => key($temas) + 1]);
			next($temas);
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
}
