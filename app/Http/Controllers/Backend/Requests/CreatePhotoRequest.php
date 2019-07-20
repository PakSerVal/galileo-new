<?php

namespace App\Http\Controllers\Backend\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Запрос на создание фото.
 *
 * @property-read $title
 * @property-read $image_id
 *
 * @author Pak Sergey
 */
class CreatePhotoRequest extends FormRequest {
	const ATTR_TITLE    = 'title';
	const ATTR_IMAGE_ID = 'image_id';

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
			static::ATTR_TITLE    => 'required|string',
			static::ATTR_IMAGE_ID => 'required|int',
		];
	}
}
