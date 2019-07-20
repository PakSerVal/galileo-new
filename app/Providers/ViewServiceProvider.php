<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\View;

/**
 * Провайдер вьюшек.
 *
 * @author Pak Sergey
 */
class ViewServiceProvider extends ServiceProvider {
	/**
	 * @inheritdoc
	 *
	 * @return void
	 */
	public function register() {
		//
	}

	/**
	 * @inheritdoc
	 *
	 * @return void
	 */
	public function boot()
	{
		// Using class based composers...
		View::composer(
			'image-input', 'App\Http\View\Composers\ProfileComposer'
		);
	}
}
