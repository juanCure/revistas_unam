<?php

namespace App\Http\Livewire\Idiomas;

use App\Models\Idioma;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Index extends Component {

	public $idiomas, $nombre, $id_idioma;
	public $updateMode = false, $idiomaBeingRemoved;

	protected $listeners = [
		'remove' => 'delete',
	];

	public function render() {
		$this->idiomas = Idioma::all();
		return view('livewire.idiomas.index');
	}

	private function resetInputFields() {
		$this->nombre = '';
	}

	public function store() {
		$rules = [
			'nombre' => ['required', 'max:45'],
		];

		$validatedData = $this->validate($rules);
		$idioma = Idioma::create($validatedData);

		// show alert
		$this->emit('alert', ['type' => 'success', 'message' => "El nuevo idioma  \"{$idioma->nombre}\" fue creado."]);
		$this->resetInputFields();
	}

	public function edit($id) {
		$idioma = Idioma::findOrFail($id);
		$this->id_idioma = $id;
		$this->nombre = $idioma->nombre;
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

		$idioma = Idioma::find($this->id_idioma);
		$idioma->update([
			'nombre' => $this->nombre,
		]);

		$this->updateMode = false;

		$this->emit('alert', ['type' => 'success', 'message' => "El idioma:  \"{$idioma->nombre}\" fue actualizado."]);
		$this->resetInputFields();
	}

	public function confirmIdiomaRemoval($idioma_id){
		
		$this->idiomaBeingRemoved = $idioma_id;
		$this->dispatchBrowserEvent('show-delete-modal');
	}

	public function delete() {
		try {
			$idioma = Idioma::findOrFail($this->idiomaBeingRemoved);
			$idioma->delete();
			$this->emit('alert', ['type' => 'success', 'message' => "El idioma \"{$idioma->nombre}\" fue borrado exitosamente!"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		}

	}
}
