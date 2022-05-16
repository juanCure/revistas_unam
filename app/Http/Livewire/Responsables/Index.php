<?php

namespace App\Http\Livewire\Responsables;

use App\Models\Responsable;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component {
	use WithPagination;
	public $id_responsable, $searchTerm, $nombres, $apellidos, $correo_electronico, $segundo_correo_electronico, $telefonos, $grado, $responsableBeingRemoved;

	// Establecer que estilo utilizar para los enlaces de paginación
	protected $paginationTheme = 'bootstrap';

	protected $listeners = [
		'remove' => 'delete',
	];

	public function render() {
		// return view('livewire.responsables.index', [
		// 	'responsables' => Responsable::where(function ($sub_query) {
		// 		$sub_query->where(DB::raw('CONCAT_WS(" ", grado, nombres, apellidos)'), 'like', $this->searchTerm . '%')
		// 			->orWhere('correo_electronico', 'like', '%' . $this->searchTerm . '%')
		// 			->orWhere('grado', 'like', '%' . $this->searchTerm . '%');
		// 	})->paginate(20),
		// ]);
		//
		return view('livewire.responsables.index', [
			'responsables' => Responsable::where(function ($sub_query) {
				// $sub_query->where('nombres', 'like', '%' . $this->searchTerm . '%');
				$sub_query->where(DB::raw('CONCAT_WS(" ", grado, nombres, apellidos)'), 'like', '%' . $this->searchTerm . '%');
			})->paginate(15),
		]);
	}

	public function resetInputFields() {
		$this->nombres = '';
		$this->apellidos = '';
		$this->correo_electronico = '';
		$this->segundo_correo_electronico = '';
		$this->telefonos = '';
		$this->grado = '';
	}

	public function store() {
		$validatedData = $this->validate([
			'grado' => 'nullable',
			'nombres' => 'required',
			'apellidos' => 'required',
			'correo_electronico' => 'nullable|email',
			'segundo_correo_electronico' => 'nullable|email',
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
		$this->segundo_correo_electronico = $responsable->segundo_correo_electronico;
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
			'segundo_correo_electronico' => 'nullable|email',
			'telefonos' => 'nullable',
		]);

		$responsable = Responsable::find($this->id_responsable);
		// dd($this->nombre);
		$responsable->update([
			'grado' => $this->grado,
			'nombres' => $this->nombres,
			'apellidos' => $this->apellidos,
			'correo_electronico' => $this->correo_electronico,
			'segundo_correo_electronico' => $this->segundo_correo_electronico,
			'telefonos' => $this->telefonos,
		]);

		// session()->flash('success', "La area \"{$area->nombre}\" fue actualizada exitosamente.");
		$this->emit('alert', ['type' => 'success', 'message' => "El responsable \"{$responsable->grado} {$responsable->nombres} {$responsable->apellidos}\" fue actualizado."]);
		$this->resetInputFields();
		$this->emit('responsableActualizado');
	}

	public function confirmResponsableRemoval($responsable_id){
		$this->responsableBeingRemoved = $responsable_id;
		$this->dispatchBrowserEvent('show-delete-modal');
	}

	public function delete() {

		try {
			$responsable = Responsable::findOrFail($this->responsableBeingRemoved);
			$responsable->delete();
			$this->emit('alert', ['type' => 'success', 'message' => "El usuario responsable \"{$responsable->nombre}\" fue borrado exitosamente!"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		}
	}
}
