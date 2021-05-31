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
			'descripcion' => ['required'],
			//'issn' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/u'],
			//'issne' => ['nullable', 'regex:/[\S]{4}\-[\S]{4}/u'],
			'issn' => ['nullable', 'regex:/[0-9][0-9][0-9][0-9][-][0-9][0-9][0-9][0-9]/'],
			'issne' => ['nullable', 'regex:/[0-9][0-9][0-9][0-9][-][0-9][0-9][0-9][X0-9]/'],
			'anio_inicio' => ['required', 'integer'],
			'arbitrada' => ['required', 'in:Si,No'],
			'soporte' => ['required', 'in:Ambas,Electrónica,Impresa'],
			'situacion' => ['required', 'in:Vigente,Descontinuada'],
			'tipo_revista' => ['required', 'in:Cultural,Divulgación,Investigación,Técnico-Profesional'],
			'imagen' => ['nullable'],
			'ojs_ruta' => ['nullable'],
			'id_frecuencia' => ['required', 'numeric'],
			'id_area_conocimiento' => ['required', 'numeric'],
			'id_subsistema' => ['required', 'numeric'],
			'otros_indices' => ['nullable'],
			'editoriales' => ['required', 'array', 'min:1'],
			'editoriales.*' => ['required', 'numeric', 'distinct'],
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
