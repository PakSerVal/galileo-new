<?php

namespace App\Http\Controllers\Frontend\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Запрос на сохранение отзыва.
 *
 * @property-read string $name
 * @property-read string $content
 */
class SaveOpinionRequest extends FormRequest {
	const ATTR_NAME    = 'name';
	const ATTR_CONTENT = 'content';

	/**
	 * @inheritdoc
	 *
	 * @author Pak Sergey
	 */
	public function rules() {
		return [
			static::ATTR_NAME    => 'required|string',
			static::ATTR_CONTENT => 'required|string',
		];
	}
}
