<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $id
 * @property string $title
 * @property string $content
 * @property int    $thumb_image_id
 * @property string $preview_text
 * @property int    $priority
 * @property bool   $is_published
 * @property string $created_at
 * @property string $updated_at
 */
class Article extends Model {
	const ATTR_ID             = 'id';
	const ATTR_TITLE          = 'title';
	const ATTR_CONTENT        = 'content';
	const ATTR_THUMB_IMAGE_ID = 'thumb_image_id';
	const ATTR_PREVIEW_TEXT   = 'preview_text';
	const ATTR_PRIORITY       = 'priority';
	const ATTR_IS_PUBLISHED   = 'is_published';
	const ATTR_CREATED_AT     = 'created_at';
	const ATTR_UPDATED_AT     = 'updated_at';

	public function thumbImage(): Image {
		return Image::find($this->thumb_image_id);
	}
}
