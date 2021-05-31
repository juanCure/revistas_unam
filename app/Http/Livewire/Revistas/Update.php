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

class Update extends Component {

	public $currentStep = 1, $id_revista;
	public $titulo, $descripcion, $issn, $issne, $anio_inicio, $otros_indices,
	$situacion, $arbitrada, $tipo_revista, $soporte, $id_area_conocimiento,
	$id_frecuencia, $id_subsistema, $indicador;
	public $successMessage = '';

	public $frecuencias, $subsistemas, $editoriales, $areas_conocimiento, $entidades, $idiomas, $temas;
	public $selected_editoriales = [], $selected_entidades = [], $selected_idiomas = [], $selected_temas = [];

	public function mount($revista) {

		// Establecer valores en el modelo
		$this->id_revista = $revista->id_revista;
		$this->titulo = $revista->titulo;
		$this->descripcion = $revista->descripcion;
		$this->issn = $revista->issn;
		$this->issne = $revista->issne;
		$this->anio_inicio = $revista->anio_inicio;
		$this->otros_indices = $revista->otros_indices;
		$this->situacion = $revista->situacion;
		$this->arbitrada = $revista->arbitrada;
		// dd($this->arbitrada);
		$this->tipo_revista = $revista->tipo_revista;
		$this->soporte = $revista->soporte;
		$this->id_area_conocimiento = $revista->id_area_conocimiento;
		$this->id_frecuencia = $revista->id_frecuencia;
		$this->id_subsistema = $revista->id_subsistema;
		$this->areas_conocimiento = AreasConocimiento::all();
		$this->frecuencias = Frecuencia::all();
		$this->subsistemas = Subsistema::all();
		$this->editoriales = Editorial::all();
		$this->entidades = EntidadEditora::all()->sortBy('nombre');
		$this->idiomas = Idioma::all()->sortBy('nombre');
		$this->temas = Tema::all()->sortBy('nombre');
		$this->indicador = $revista->indicador;

		//dd($revista->editoriales);
		foreach ($revista->editoriales as $editorial) {
			//dump((string) $editorial->id);
			$this->selected_editoriales[] = (string) $editorial->id;
		}

		foreach ($revista->entidades_editoras as $entidad) {
			$this->selected_entidades[] = (string) $entidad->id;
		}

		foreach ($revista->idiomas as $idioma) {
			$this->selected_idiomas[] = (string) $idioma->id;
		}

		foreach ($revista->temas as $tema) {
			$this->selected_temas[] = (string) $tema->id;
		}
	}

	public function render() {
		$this->dispatchBrowserEvent('myownapp:scroll-to', [
			'query' => '.alert',
		]);
		return view('livewire.revistas.update');

	}

	public function firstStepSubmit() {
		// Validando los datos que serán agregados en la tabla principal de revistas
		$validatedData = $this->validate([
			'titulo' => ['required', 'max:256'],
			'descripcion' => ['required'],
			'issn' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/u'],
			'issne' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/u'],
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

	public function secondStepSubmit() {
		// Validando los datos asociados a las editoriales
		$validatedData = $this->validate([
			'selected_editoriales' => ['required', 'array', 'min:1'],
			'selected_editoriales.*' => ['required', 'numeric', 'distinct'],
			'selected_entidades' => ['required', 'array', 'min:1'],
			'selected_entidades.*' => ['required', 'numeric', 'distinct'],
		]);
		$this->dispatchBrowserEvent('myownapp:scroll-to', [
			// 'query' => '#step-2',
			'query' => '.stepwizard',
		]);
		$this->currentStep = 3;
	}

	public function thirdStepSubmit() {
		$validatedData = $this->validate([
			'selected_idiomas' => ['required', 'array', 'min:1'],
			'selected_idiomas.*' => ['required', 'numeric', 'distinct'],
			'selected_temas' => ['required', 'array', 'min:1'],
			'selected_temas.*' => ['required', 'numeric', 'distinct'],
		]);
		$this->dispatchBrowserEvent('myownapp:scroll-to', [
			// 'query' => '#step-2',
			'query' => '.stepwizard',
		]);
		$this->currentStep = 4;
	}

	public function myupdate() {
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
			//'ojs_ruta' => $this->,
			'id_frecuencia' => $this->id_frecuencia,
			'id_area_conocimiento' => $this->id_area_conocimiento,
			'id_subsistema' => $this->id_subsistema,
			'indicador' => $this->indicador,
		]);

		// Actualizando las editoriales asociadas de la revista
		$revista->editoriales()->detach();
		foreach ($this->selected_editoriales as $id_editorial) {
			//dump($id_editorial);
			$editorial = Editorial::findOrFail($id_editorial);
			$revista->editoriales()->attach($editorial->id, ['orden' => key($this->selected_editoriales) + 1]);
			next($this->selected_editoriales);
		}

		// Actualizando las entidades editoras asociadas de la revista
		$revista->entidades_editoras()->detach();
		foreach ($this->selected_entidades as $id_entidad) {
			//dump($id_editorial);
			$entidad = EntidadEditora::findOrFail($id_entidad);
			$revista->entidades_editoras()->attach($entidad->id, ['orden' => key($this->selected_entidades) + 1]);
			next($this->selected_entidades);
		}

		// Actualizando los idiomas asociados de la revista
		$revista->idiomas()->detach();
		foreach ($this->selected_idiomas as $id_idioma) {
			//dump($id_editorial);
			$idioma = Idioma::findOrFail($id_idioma);
			$revista->idiomas()->attach($idioma->id, ['orden' => key($this->selected_idiomas) + 1]);
			next($this->selected_idiomas);
		}

		// Actualizando los temas asociadas de la revista
		$revista->temas()->detach();
		foreach ($this->selected_temas as $id_tema) {
			//dump($id_editorial);
			$tema = Tema::findOrFail($id_tema);
			$revista->temas()->attach($tema->id, ['orden' => key($this->selected_temas) + 1]);
			next($this->selected_temas);
		}

		//$this->successMessage = "Revista {$this->titulo} ha sido editada con éxito!";
		session()->flash('success', "La revista \"{$revista->titulo}\" fue editada con éxito!");
		return redirect()
			->route('revistas.index');
	}

	public function back($step) {
		$this->currentStep = $step;
	}
}
