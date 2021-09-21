<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Solarium\Client;
use Solarium\Core\Client\Adapter\Curl;
use Symfony\Component\EventDispatcher\EventDispatcher;

class SolariumServiceProvider extends ServiceProvider {
	protected $defer = true;
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(Client::class, function ($app) {

			$adapter = new Curl();
			$dispatcher = new EventDispatcher();
			return new Client($adapter, $dispatcher, $app['config']['solarium']);
		});
	}

	public function provides() {
		return [Client::class];
	}

	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}
}
