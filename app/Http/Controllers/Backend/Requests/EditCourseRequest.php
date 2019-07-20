<?php

namespace App\Http\Controllers\Backend\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Запрос на создание курса.
 *
 * @property-read $id
 * @property-read $title
 * @property-read $description
 * @property-read $view_path
 *
 * @author Pak Sergey
 */
class EditCourseRequest extends FormRequest {
	const ATTR_ID          = 'id';
	const ATTR_TITLE       = 'title';
	const ATTR_DESCRIPTION = 'description';
	const ATTR_VIEW_PATH   = 'view_path';

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
			static::ATTR_ID          => 'required|string',
			static::ATTR_TITLE       => 'required|string',
			static::ATTR_DESCRIPTION => 'required|string',
			static::ATTR_VIEW_PATH   => 'required|string',
		];
	}
}
