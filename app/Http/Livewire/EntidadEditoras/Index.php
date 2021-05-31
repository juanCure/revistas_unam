<?php

namespace App\Http\Livewire\EntidadEditoras;

use App\Models\EntidadEditora;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Index extends Component {

	public $entidad_editoras, $nombre, $id_entidad;
	public $updateMode = false;

	protected $listeners = [
		'remove' => 'delete',
	];

	public function render() {
		$this->entidad_editoras = EntidadEditora::all();
		return view('livewire.entidad-editoras.index');
	}

	private function resetInputFields() {
		$this->nombre = '';
	}

	public function store() {
		$rules = [
			'nombre' => ['required', 'max:80'],
		];

		$validatedData = $this->validate($rules);
		$entidad_editora = EntidadEditora::create($validatedData);
		//session()->flash('success', "La nueva área  \"{$area->nombre}\" fue creada.");

		// show alert
		//$this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Saved"]);
		//$this->emit('toastr-success', "Nueva área creada");
		$this->emit('alert', ['type' => 'success', 'message' => "El nueva entidad  \"{$entidad_editora->nombre}\" fue creada."]);
		$this->resetInputFields();
	}

	public function edit($id) {
		$entidad_editora = EntidadEditora::findOrFail($id);
		$this->id_entidad = $id;
		$this->nombre = $entidad_editora->nombre;
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
			'nombre' => ['required', 'max:80'],
		];
		$validatedData = $this->validate($rules);

		$entidad_editora = EntidadEditora::find($this->id_entidad);
		$entidad_editora->update([
			'nombre' => $this->nombre,
		]);

		$this->updateMode = false;

		// session()->flash('success', "La area \"{$area->nombre}\" fue actualizada exitosamente.");
		$this->emit('alert', ['type' => 'success', 'message' => "La entidad \"{$entidad_editora->nombre}\" fue actualizada."]);
		$this->resetInputFields();
	}

	public function delete($id) {
		try {
			EntidadEditora::find($id)->delete();
			//session()->flash('success', "Area eliminada exitosamente");
			$this->emit('alert', ['type' => 'success', 'message' => "Entidad eliminada exitosamente"]);
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
		}

	}
}
