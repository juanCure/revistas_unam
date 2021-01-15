<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RevistaRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'titulo' => ['required', 'max:256'],
			'descripcion' => ['required', 'max:1000'],
			'issn' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/i'],
			'issne' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/i'],
			'anio_inicio' => ['required', 'min:1'],
			'arbitrada' => ['required', 'in:Si,No'],
			'situacion' => ['required', 'in:vigente,descontinuada'],
			'imagen' => ['nullable'],
			'ojs_ruta' => ['nullable'],
			'id_frecuencia' => ['required', 'in:1,2,3'],
			'id_soporte' => ['required', 'in:1,2,3'],
			'id_tipo_revista' => ['required', 'in:1,2,3,4'],
			'id_area_conocimiento' => ['required', 'in:1,2,3,4'],
			'id_subsistema' => ['required', 'in:1,2,3'],
			'otros_indices' => ['nullable'],
			'editorial' => ['required', 'max:100'],
		];
	}

	/*public function withValidator($validator) {
		$validator->after(function ($validator) {
			if ($this->status == 'available' && $this->stock == 0) {
				$validator->errors()->add('stock', 'If available, must have stock');
			}
		});
	}*/
}
