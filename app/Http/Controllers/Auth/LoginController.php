<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller {
	const ACTION_LOGIN      = 'login';
	const ACTION_LOGOUT     = 'logout';
	const ACTION_LOGIN_FORM = 'showLoginForm';

	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest')->except('logout');
	}

	/**
	 * @inheritdoc
	 *
	 * @param Request $request
	 * @param User    $user
	 *
	 * @author Pak Sergey
	 */
	protected function authenticated(Request $request, $user) {
		if ($user->isAdmin()) {
			$this->redirectTo = '/t-admin';
		}
	}
}
