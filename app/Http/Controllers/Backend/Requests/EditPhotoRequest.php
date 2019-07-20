<?php

namespace App\Http\Controllers\Backend\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Запрос на редактирование фото.
 *
 * @property-read $id
 * @property-read $title
 * @property-read $image_id //todo-17.07.19-pak.s
 *
 * @author Pak Sergey
 */
class EditPhotoRequest extends FormRequest {
	const ATTR_ID       = 'id';
	const ATTR_TITLE    = 'title';
//	const ATTR_IMAGE_ID = 'image_id';

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
			static::ATTR_ID       => 'required|int',
			static::ATTR_TITLE    => 'required|string',
//			static::ATTR_IMAGE_ID => 'required|int',
		];
	}
}
