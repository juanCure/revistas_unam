<?php

namespace App\Http\Livewire\Subsistemas;

use App\Models\Subsistema;
use Livewire\Component;

class Index extends Component {
	public $subsistemas, $nombre, $id_subsistema;
	public $updateMode = false;

	protected $listeners = [
		'remove' => 'delete',
	];

	public function render() {
		$this->subsistemas = Subsistema::all();
		return view('livewire.subsistemas.index');
	}

	private function resetInputFields() {
		$this->nombre = '';
	}

	public function store() {
		$rules = [
			'nombre' => ['required', 'max:60'],
		];

		$validatedData = $this->validate($rules);
		$subsistema = Subsistema::create($validatedData);
		//session()->flash('success', "La nueva área  \"{$area->nombre}\" fue creada.");

		// show alert
		//$this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Saved"]);
		//$this->emit('toastr-success', "Nueva área creada");
		$this->emit('alert', ['type' => 'success', 'message' => "El nuevo subsistema  \"{$subsistema->nombre}\" fue creado."]);
		$this->resetInputFields();
	}

	public function edit($id) {
		$subsistema = Subsistema::findOrFail($id);
		$this->id_subsistema = $id;
		$this->nombre = $subsistema->nombre;
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
			'nombre' => ['required', 'max:60'],
		];
		$validatedData = $this->validate($rules);

		$subsistema = Subsistema::find($this->id_subsistema);
		$subsistema->update([
			'nombre' => $this->nombre,
		]);

		$this->updateMode = false;

		// session()->flash('success', "La area \"{$area->nombre}\" fue actualizada exitosamente.");
		$this->emit('alert', ['type' => 'success', 'message' => "El subsistema \"{$subsistema->nombre}\" fue actualizado."]);
		$this->resetInputFields();
	}

	public function delete($id) {
		try {
			Subsistema::find($id)->delete();
			//session()->flash('success', "Area eliminada exitosamente");
			$this->emit('alert', ['type' => 'success', 'message' => "Subsistema eliminado exitosamente"]);
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
		}

	}
}
