<?php

namespace App\Http\Livewire\Temas;

use App\Models\Tema;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Index extends Component {
	public $temas, $nombre, $id_tema;
	public $updateMode = false, $temaBeingRemoved;

	protected $listeners = [
		'remove' => 'delete',
	];

	public function render() {
		$this->temas = Tema::all();
		return view('livewire.temas.index');
	}

	private function resetInputFields() {
		$this->nombre = '';
	}

	public function store() {
		$rules = [
			'nombre' => ['required', 'max:100'],
		];

		$validatedData = $this->validate($rules);
		$tema = Tema::create($validatedData);

		// show alert
		$this->emit('alert', ['type' => 'success', 'message' => "El nuevo tema  \"{$tema->nombre}\" fue creado."]);
		$this->resetInputFields();
	}

	public function edit($id) {
		$tema = Tema::findOrFail($id);
		$this->id_tema = $id;
		$this->nombre = $tema->nombre;
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

		$tema = Tema::find($this->id_tema);
		$tema->update([
			'nombre' => $this->nombre,
		]);

		$this->updateMode = false;

		$this->emit('alert', ['type' => 'success', 'message' => "El tema:  \"{$tema->nombre}\" fue actualizado."]);
		$this->resetInputFields();
	}

	public function confirmTemaRemoval($tema_id) {
		$this->temaBeingRemoved = $tema_id;
		$this->dispatchBrowserEvent('show-delete-modal');
	}

	public function delete() {

		try {
			$tema = Tema::findOrFail($this->temaBeingRemoved);
			$tema->delete();
			$this->emit('alert', ['type' => 'success', 'message' => "El tema \"{$tema->nombre}\" fue borrado exitosamente!"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		}

	}
}
