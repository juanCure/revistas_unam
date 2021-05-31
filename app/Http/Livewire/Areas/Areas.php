<?php

namespace App\Http\Livewire\Areas;

use App\Models\AreasConocimiento;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Areas extends Component {
	public $areas_conocimiento, $nombre, $id_area;
	public $updateMode = false;

	protected $listeners = [
		'remove' => 'delete',
	];

	public function render() {
		$this->areas_conocimiento = AreasConocimiento::all();
		return view('livewire.areas.index');
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
		$area = AreasConocimiento::create($validatedData);
		//session()->flash('success', "La nueva área  \"{$area->nombre}\" fue creada.");

		// show alert
		//$this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => "Saved"]);
		//$this->emit('toastr-success', "Nueva área creada");
		$this->emit('alert', ['type' => 'success', 'message' => "La nueva área  \"{$area->nombre}\" fue creada."]);
		$this->resetInputFields();
	}

	public function edit($id) {
		$area = AreasConocimiento::findOrFail($id);
		$this->id_area = $id;
		$this->nombre = $area->nombre;
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

		$area = AreasConocimiento::find($this->id_area);
		$area->update([
			'nombre' => $this->nombre,
		]);

		$this->updateMode = false;

		// session()->flash('success', "La area \"{$area->nombre}\" fue actualizada exitosamente.");
		$this->emit('alert', ['type' => 'success', 'message' => "La área \"{$area->nombre}\" fue actualizada."]);
		$this->resetInputFields();
	}

	public function delete($id) {
		try {
			AreasConocimiento::find($id)->delete();
			//session()->flash('success', "Area eliminada exitosamente");
			$this->emit('alert', ['type' => 'success', 'message' => "Area eliminada exitosamente"]);
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
		}

	}
}
