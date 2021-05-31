<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class MacrosServiceProvider extends ServiceProvider {
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	// public function boot()
	// {
	//     //
	// }

	public function boot() {
		Component::macro('scrollOnFail', function (string $query, callable $closure) {
			/* @var Component $this */

			try {
				$closure();
			} catch (ValidationException $e) {
				$this->dispatchBrowserEvent('myownapp:scroll-to', [
					'query' => $query,
				]);

				throw $e;
			}
		});
	}
}
