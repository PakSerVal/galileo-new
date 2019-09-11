<?php

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;
use Url;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register() {
		if ($this->app->environment() !== 'production') {
			$this->app->register(IdeHelperServiceProvider::class);
		}

		if ($this->app->environment() === 'production') {
			URL::forceSchema('https');
		}
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}
}
