<?php

namespace App\Http\Middleware;

use App\http\controllers\auth\LoginController;
use App\Models\User;
use Closure;

/**
 * Admin middleware.
 *
 * @author Pak Sergey
 */
class AdminMiddleware {
	/**
	 * @inheritdoc
	 *
	 * @author Pak Sergey
	 */
	public function handle($request, Closure $next) {
		$user = auth()->user(); /** @var User $user */

		if (null === $user) {
			return redirect()->action(LoginController::getActionUrl(LoginController::ACTION_LOGIN));
		}

		if (false === $user->isAdmin()) {
			return redirect('/t-admin');
		}

		return $next($request);
	}
}

