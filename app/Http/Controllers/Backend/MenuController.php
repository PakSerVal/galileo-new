<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

/**
 * Class MenuController
 *
 * @author Pak Sergey
 */
class MenuController extends Controller {

	const ACTION_INDEX = 'index';

	/**
	 * Меню в админке.
	 *
	 * @author Pak Sergey
	 */
	public function index() {
		return View::make('backend.menu');
	}
}
