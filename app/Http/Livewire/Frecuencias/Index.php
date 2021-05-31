<?php

namespace App\Http\Livewire\Frecuencias;

use App\Models\Frecuencia;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Index extends Component {
	public $frecuencias, $nombre, $id_frecuencia;
	public $updateMode = false;

	protected $listeners = [
		'remove' => 'delete',
	];

	public function render() {
		$this->frecuencias = Frecuencia::all();
		return view('livewire.frecuencias.index');
	}

	private function resetInputFields() {
		$this->nombre = '';
		// $this->dispatchBrowserEvent('say-goodbye', ['nombre' => 'JUan']);
	}

	public function store() {
		$rules = [
			'nombre' => ['required', 'max:100'],
		];

		$validatedData = $this->validate($rules);
		$area = Frecuencia::create($validatedData);
		//session()->flash('success', "La nueva área  \"{$area->nombre}\" fue creada.");

		// show alert
		//$this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Saved"]);
		//$this->emit('toastr-success', "Nueva área creada");
		$this->emit('alert', ['type' => 'success', 'message' => "La nueva frecuencia  \"{$area->nombre}\" fue creada."]);
		$this->resetInputFields();
	}

	public function edit($id) {
		$frecuencia = Frecuencia::findOrFail($id);
		$this->id_frecuencia = $id;
		$this->nombre = $frecuencia->nombre;
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

		$frecuencia = Frecuencia::find($this->id_frecuencia);
		$frecuencia->update([
			'nombre' => $this->nombre,
		]);

		$this->updateMode = false;

		// session()->flash('success', "La area \"{$area->nombre}\" fue actualizada exitosamente.");
		$this->emit('alert', ['type' => 'success', 'message' => "La frecuencia \"{$frecuencia->nombre}\" fue actualizada."]);
		$this->resetInputFields();
	}

	public function delete($id) {
		try {
			Frecuencia::find($id)->delete();
			//session()->flash('success', "Area eliminada exitosamente");
			$this->emit('alert', ['type' => 'success', 'message' => "Frecuencia eliminada exitosamente"]);
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
		}

	}
}
