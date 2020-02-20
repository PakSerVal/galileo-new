<?php

namespace App\Http\Controllers\Backend\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read $title
 * @property-read $content
 * @property-read $is_published
 * @property-read $priority
 * @property-read $image_id
 * @property-read $preview_text
 */
class CreateArticleRequest extends FormRequest {
	const ATTR_TITLE        = 'title';
	const ATTR_CONTENT      = 'content';
	const ATTR_IS_PUBLISHED = 'is_published';
	const ATTR_IMAGE_ID     = 'image_id';
	const ATTR_PRIORITY     = 'priority';
	const ATTR_PREVIEW_TEXT = 'preview_text';

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
			static::ATTR_TITLE        => 'required|string',
			static::ATTR_CONTENT      => 'required|string',
			static::ATTR_IS_PUBLISHED => 'bool',
			static::ATTR_IMAGE_ID     => 'required|int',
			static::ATTR_PRIORITY     => 'required|int',
			static::ATTR_PREVIEW_TEXT => 'required|string',
		];
	}
}
