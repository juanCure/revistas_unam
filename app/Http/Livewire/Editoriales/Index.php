<?php

namespace App\Http\Livewire\Editoriales;

use App\Models\Editorial;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Index extends Component {

	public $editoriales, $nombre, $id_editorial;
	public $updateMode = false;
	public $editorialBeingRemoved = null;

	protected $listeners = [
		'remove' => 'delete',
	];

	public function render() {
		$this->editoriales = Editorial::all();
		return view('livewire.editoriales.index');
	}

	private function resetInputFields() {
		$this->nombre = '';
	}

	public function store() {
		$rules = [
			'nombre' => ['required', 'max:100'],
		];

		$validatedData = $this->validate($rules);
		$editorial = Editorial::create($validatedData);
		//session()->flash('success', "La nueva área  \"{$area->nombre}\" fue creada.");

		// show alert
		//$this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Saved"]);
		//$this->emit('toastr-success', "Nueva área creada");
		$this->emit('alert', ['type' => 'success', 'message' => "El nueva editorial  \"{$editorial->nombre}\" fue creada."]);
		$this->resetInputFields();
	}

	public function edit($id) {
		$editorial = Editorial::findOrFail($id);
		$this->id_editorial = $id;
		$this->nombre = $editorial->nombre;
		$this->updateMode = true;
		$this->dispatchBrowserEvent('myownapp:scroll-to', [
			'query' => '.form-group',
		]);
	}

	public function cancel() {
		$this->updateMode = false;
		$this->resetInputFields();
	}

	public function update() {
		$rules = [
			'nombre' => ['required', 'max:100'],
		];
		$validatedData = $this->validate($rules);

		$editorial = Editorial::find($this->id_editorial);
		$editorial->update([
			'nombre' => $this->nombre,
		]);

		$this->updateMode = false;

		// session()->flash('success', "La area \"{$area->nombre}\" fue actualizada exitosamente.");
		$this->emit('alert', ['type' => 'success', 'message' => "La editorial  \"{$editorial->nombre}\" fue actualizada."]);
		$this->resetInputFields();
	}

	public function confirmEditorialRemoval($editorial_id){
		
		$this->editorialBeingRemoved = $editorial_id;
		$this->dispatchBrowserEvent('show-delete-modal');
	}

	public function delete() {
		try {
			$editorial = Editorial::findOrFail($this->editorialBeingRemoved);
			$editorial->delete();
			$this->emit('alert', ['type' => 'success', 'message' => "La editorial \"{$editorial->nombre}\" fue borrada exitosamente!"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		}

	}
}
