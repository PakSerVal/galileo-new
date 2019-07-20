<?php

namespace App\http\controllers\admin\requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Edit product request.
 *
 * @property-read string $name
 * @property-read string $phone
 */
class EnrollRequest extends FormRequest {
	const ATTR_NAME  = 'name';
	const ATTR_PHONE = 'phone';

	/**
	 * @inheritdoc
	 *
	 * @author Pak Sergey
	 */
	public function rules() {
		return [
			static::ATTR_NAME  => 'required|string',
			static::ATTR_PHONE => 'required|string',
		];
	}
}
