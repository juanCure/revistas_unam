<?php

namespace App\Http\Livewire\Responsables;

use App\Models\Responsable;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component {
	use WithPagination;
	public $id_responsable;
	public $searchTerm;
	public $nombres;
	public $apellidos;
	public $correo_electronico;
	public $telefonos;
	public $grado;

	// Establecer que estilo utilizar para los enlaces de paginación
	protected $paginationTheme = 'bootstrap';

	protected $listeners = [
		'remove' => 'delete',
	];

	public function render() {
		return view('livewire.responsables.index', [
			'responsables' => Responsable::where(function ($sub_query) {
				$sub_query->where(DB::raw('CONCAT_WS(" ", grado, nombres, apellidos)'), 'like', $this->searchTerm . '%')
					->orWhere('correo_electronico', 'like', '%' . $this->searchTerm . '%')
					->orWhere('grado', 'like', '%' . $this->searchTerm . '%');
			})->paginate(20),
		]);
	}

	public function resetInputFields() {
		$this->nombres = '';
		$this->apellidos = '';
		$this->correo_electronico = '';
		$this->telefonos = '';
		$this->grado = '';
	}

	public function store() {
		$validatedData = $this->validate([
			'grado' => 'nullable',
			'nombres' => 'required',
			'apellidos' => 'required',
			'correo_electronico' => 'nullable|email',
			'telefonos' => 'nullable',
		]);

		$responsable = Responsable::create($validatedData);
		$this->emit('alert', ['type' => 'success', 'message' => "El nuevo responsable  \"{$responsable->nombres}\" fue creada."]);
		$this->resetInputFields();
		$this->emit('responsableAgregado');
	}

	public function edit($id) {
		$responsable = Responsable::findOrFail($id);
		$this->id_responsable = $id;
		$this->grado = $responsable->grado;
		$this->nombres = $responsable->nombres;
		$this->apellidos = $responsable->apellidos;
		$this->correo_electronico = $responsable->correo_electronico;
		$this->telefonos = $responsable->telefonos;
		// $this->dispatchBrowserEvent('myownapp:scroll-to', [
		// 	'query' => '.form-group',
		// ]);
	}

	public function update() {
		$validatedData = $this->validate([
			'grado' => 'nullable',
			'nombres' => 'required',
			'apellidos' => 'required',
			'correo_electronico' => 'nullable|email',
			'telefonos' => 'nullable',
		]);

		$responsable = Responsable::find($this->id_responsable);
		// dd($this->nombre);
		$responsable->update([
			'grado' => $this->grado,
			'nombres' => $this->nombres,
			'apellidos' => $this->apellidos,
			'correo_electronico' => $this->correo_electronico,
			'telefonos' => $this->telefonos,
		]);

		// session()->flash('success', "La area \"{$area->nombre}\" fue actualizada exitosamente.");
		$this->emit('alert', ['type' => 'success', 'message' => "El responsable \"{$responsable->grado} {$responsable->nombres} {$responsable->apellidos}\" fue actualizado."]);
		$this->resetInputFields();
		$this->emit('responsableActualizado');
	}

	public function delete($id) {
		try {
			Responsable::find($id)->delete();
			//session()->flash('success', "Area eliminada exitosamente");
			$this->emit('alert', ['type' => 'success', 'message' => "Responsable eliminado exitosamente!"]);
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
		}

	}
}
