<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		// Estableciendo que se utilizará Bootstrap para los enlaces de paginación
		Paginator::useBootstrap();
		// Lo siguiente fue agregado para forzar que todas las rutas, enlaces a assets y enlaces de paginación
		// sean solicitados vía HTTPS
		/*if (env('APP_ENV') === 'production') {
			$this->app['request']->server->set('HTTPS', true);
		}*/
		if($this->app->environment('production')) {
 		   \URL::forceScheme('https');
		}
	}
}
