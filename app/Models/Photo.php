<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель фото.
 *
 * @property int    $id
 * @property string $title
 * @property int    $image_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Image $image
 *
 * @author Pak Sergey
 */
class Photo extends Model {
	const ATTR_ID         = 'id';
	const ATTR_TITLE      = 'title';
	const ATTR_IMAGE_ID   = 'image_id';
	const ATTR_CREATED_AT = 'created_at';
	const ATTR_UPDATED_AT = 'updated_at';

	/**
	 * Получение изображения для фото.
	 *
	 * @author Pak Sergey
	 */
	public function image() {
		return $this->belongsTo(Image::class);
	}
}
