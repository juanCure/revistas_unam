<?php

namespace App\Http\Livewire\Revistas;

use App\Models\Revista;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component {
	use WithPagination;
	public $searchTerm;

	// Establecer que estilo utilizar para los enlaces de paginación
	protected $paginationTheme = 'bootstrap';

	public function render() {
		return view('livewire.revistas.index', [
			'revistas' => Revista::where(function ($sub_query) {
				$sub_query->where('titulo', 'like', '%' . $this->searchTerm . '%');
			})->paginate(20),
		]);
	}
}
