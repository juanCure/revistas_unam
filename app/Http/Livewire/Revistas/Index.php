<?php

namespace App\Http\Livewire\Revistas;

use App\Models\Revista;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component {
	use WithPagination;
	public $searchTerm;
	public $journalBeingRemoved = null;

	// Establecer que estilo utilizar para los enlaces de paginación
	protected $paginationTheme = 'bootstrap';

	public function render() {
		return view('livewire.revistas.index', [
			'revistas' => Revista::where(function ($sub_query) {
				$sub_query->where('titulo', 'like', '%' . $this->searchTerm . '%');
			})->orderBy('titulo', 'asc')->paginate(20),
		]);
	}

	public function confirmJournalRemoval($journal_id){
		
		$this->journalBeingRemoved = $journal_id;
		$this->dispatchBrowserEvent('show-delete-modal');
	}

	public function delete(){
		try {
			$journal = Revista::findOrFail($this->journalBeingRemoved);
			$journal->editoriales()->detach();
			$journal->entidades_editoras()->detach();
			$journal->idiomas()->detach();
			$journal->temas()->detach();
			$journal->sistemas_indexadores()->detach();
			$journal->responsables()->detach();
			$journal->delete();
			$this->emit('alert', ['type' => 'success', 'message' => "La revista \"{$journal->titulo}\" fue borrada exitosamente!"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		} catch (QueryException $ex) {
			$this->emit('alert', ['type' => 'error', 'message' => "No se pudo borrar el elemento seleccionado"]);
			$this->dispatchBrowserEvent('hide-delete-modal');
		}
		
		
	}
}
