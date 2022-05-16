<?php

namespace App\Http\Livewire\SistemasIndexadores;

use App\Models\SistemaIndexador;
use Livewire\Component;
use Illuminate\Database\QueryException;

class Index extends Component {

	public $indexadores, $nombre, $id_indexador;
	public $updateMode = false, $sistemaBeingRemoved;

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

	public function confirmSistemaIndexadorRemoval($sistema_id){
		$this->sistemaBeingRemoved = $sistema_id;
		$this->dispatchBrowserEvent('show-delete-modal');
	}

	public function delete() {
		try {
			$sistema = SistemaIndexador::findOrFail($this->sistemaBeingRemoved);
			$sistema->delete();
			$this->emit('alert', ['type' => 'success', 'message' => "El sistema \"{$sistema->nombre}\" fue borrado exitosamente!"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		}
	}
}
