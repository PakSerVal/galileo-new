<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Получение ссылки на экшен контроллера.
	 *
	 * @param string $action Экшен
	 *
	 * @return string
	 *
	 * @author Pak Sergey
	 */
	public static function getActionUrl(string $action): string {
		return static::class . '@' . $action;
	}
}
