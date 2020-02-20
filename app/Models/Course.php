<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Модель курсов.
 *
 * @property int    $id
 * @property string $title
 * @property string $slug
 * @property string $order
 * @property string $description
 * @property string $view_path
 * @property int    $image_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Image $image
 *
 * @author Pak Sergey
 */
class Course extends Model {
	const ATTR_ID          = 'id';
	const ATTR_TITLE       = 'title';
	const ATTR_SLUG        = 'slug';
	const ATTR_ORDER       = 'order';
	const ATTR_DESCRIPTION = 'description';
	const ATTR_VIEW_PATH   = 'view_path';
	const IMAGE_ID         = 'image_id';
	const ATTR_CREATED_AT  = 'created_at';
	const ATTR_UPDATED_AT  = 'updated_at';

	/**
	 * Получение изображения.
	 *
	 * @author Pak Sergey
	 */
	public function image() {
		return $this->belongsTo(Image::class);
	}
}
