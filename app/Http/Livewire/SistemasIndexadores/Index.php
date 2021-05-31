<?php

namespace App\Http\Livewire\SistemasIndexadores;

use App\Models\SistemaIndexador;
use Livewire\Component;

class Index extends Component {

	public $indexadores, $nombre, $id_indexador;
	public $updateMode = false;

	protected $listeners = [
		'remove' => 'delete',
	];

	public function render() {
		$this->indexadores = SistemaIndexador::all();
		return view('livewire.sistemas-indexadores.index');
	}

	private function resetInputFields() {
		$this->nombre = '';
	}

	public function store() {
		$rules = [
			'nombre' => ['required', 'max:45'],
		];

		$validatedData = $this->validate($rules);
		$indexador = SistemaIndexador::create($validatedData);

		// show alert
		$this->emit('alert', ['type' => 'success', 'message' => "El nuevo sistema indexador  \"{$indexador->nombre}\" fue creado."]);
		$this->resetInputFields();
	}

	public function edit($id) {
		$indexador = SistemaIndexador::findOrFail($id);
		$this->id_indexador = $id;
		$this->nombre = $indexador->nombre;
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
			'nombre' => ['required', 'max:45'],
		];
		$validatedData = $this->validate($rules);

		$indexador = SistemaIndexador::find($this->id_indexador);
		$indexador->update([
			'nombre' => $this->nombre,
		]);

		$this->updateMode = false;

		$this->emit('alert', ['type' => 'success', 'message' => "El sistema indexador:  \"{$indexador->nombre}\" fue actualizado."]);
		$this->resetInputFields();
	}

	public function delete($id) {
		try {
			SistemaIndexador::find($id)->delete();
			$this->emit('alert', ['type' => 'success', 'message' => "El sistema indexador fue eliminado exitosamente"]);
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
		}
	}
}
