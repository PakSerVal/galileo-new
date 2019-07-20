<?php

namespace App\Http\Controllers\Backend\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Запрос на создание курса.
 *
 * @property-read $text
 * @property-read $appeal
 * @property-read $is_published
 *
 * @author Pak Sergey
 */
class CreateOpinionRequest extends FormRequest {
	const ATTR_TEXT         = 'text';
	const ATTR_APPEAL       = 'appeal';
	const ATTR_IS_PUBLISHED = 'is_published';

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * @inheritDoc
	 */
	public function rules() {
		return [
			static::ATTR_TEXT         => 'required|string',
			static::ATTR_APPEAL       => 'required|string',
			static::ATTR_IS_PUBLISHED => 'bool',
		];
	}
}
